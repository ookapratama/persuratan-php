<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Surat\SuratKetTidakMampu as Surat;
use App\Models\Disposisi;
use Illuminate\Support\Facades\Storage;

class GenerateSuratController extends Controller
{
    private $fpdf;
    public function __construct()
    {
        $this->fpdf = new Fpdf;
        $this->fpdf->AddPage('P', 'A4');
        $this->fpdf->SetMargins(30, 10, 30);
        // $this->fpdf->AddPage('P', 'A4');
    }

    // main function
    function generateSurat($type = "sktm", $id)
    {
        $id = base64_decode($id);
        // Load Model Surat
        $surat = Surat::where("id", $id)->first();

        // Bagian Kop Surat
        $this->printKopSurat();

        // Bagian Bodi Surat
        switch ($type) {
            case "sktm":
                $this->printBodySuratSKTM($surat);
                break;
            case "domisili":
                $this->printBodySuratDomisili($surat);
                break;
            case "kehilangan":
                $this->printBodySuratKehilangan($surat);
                break;
            case "kematian":
                $this->printBodySuratKematian($surat);
                break;
        }

        // Bagian TTD
        $currentY = $this->fpdf->getY();
        $this->printPenandatangan($surat);
        $this->insertImageTTD($surat->approve_by->ttd, $currentY);

        $this->fpdf->Output();
        exit;
    }

    function generateDisposisi($id)
    {
        $id = base64_decode($id);

        $disposisi = Disposisi::where("id", $id)->first();

        $this->fpdf->Cell(93);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(1, 5, 'LEMBAR DISPOSISI', 0, 1, 'C');
        $this->fpdf->Ln(5);

        $this->fpdf->setFont('Times', '', 12);

        $this->fpdf->Cell(-10);
        $this->fpdf->Cell(85, 10, 'Indeks : ' . ($disposisi->perihal ?? "-"), 1, 0); // perihal
        $this->fpdf->Cell(85, 10, 'Kode : ' . ($disposisi->kode_surat ?? "-"), 1, 0); //kode surat
        $this->fpdf->Ln(10);

        $this->fpdf->Cell(-10);
        $this->fpdf->Cell(170, 175, '', 1, 0); //manual
        $this->fpdf->Ln(0);

        $suratMasuk = [
            "Tanggal/Nomor" => date("d-m-Y", strtotime($disposisi->tgl_surat ?? "-")) . ' / ' . strtoupper($disposisi->no_surat ?? "-"),
            "Asal Surat" => ($disposisi->asal_surat ?? "-"),
            "Diterima Tanggal" => date("d-m-Y", strtotime($disposisi->tgl_terima ?? "-")),
            "Tanggal Penyelesaian" => date("d-m-Y", strtotime($disposisi->tgl_selesai ?? "-")),
            "Isi Ringkas" => ($disposisi->isi_ringkas ?? "-"),
        ];

        foreach ($suratMasuk as $label => $value) {
            $this->fpdf->Cell(-10);
            $this->fpdf->Cell(42, 10, $label, 0, 0); //tgl dan no surat
            $this->fpdf->Cell(2, 10, ':', 0, 0);
            $this->fpdf->Cell(126, 10, $value, 0, 0);
            $this->fpdf->Ln(9);
        }

        $this->fpdf->Cell(-10);
        $this->fpdf->Cell(85, 14, 'ISI DISPOSISI', 1, 0, 'C');
        $this->fpdf->Cell(85, 7, 'Disalurkan', 1, 0, 'C');
        $this->fpdf->Ln(7);
        $this->fpdf->Cell(-10);
        $this->fpdf->Cell(85, 7, '', 0, 0,);
        $this->fpdf->Cell(60, 7, 'Kepada', 1, 0, 'C');
        $this->fpdf->Cell(25, 7, 'Paraf', 1, 0, 'C');
        $this->fpdf->Ln(7);

        $this->fpdf->Cell(85, 8.5, '', 0, 1);
        $this->fpdf->Ln(-8.5);
        $this->fpdf->Cell(-10);
        $this->fpdf->Cell(85, 59.5, '', 1, 0,);
        $this->fpdf->Cell(60, 8.5, '1. Kaur Tata Usaha & Umum', 1, 0,);
        $this->fpdf->Cell(25, 8.5, '', 1, 0,);
        $this->fpdf->Ln(8.5);

        $text = "";
        $arr = array(
            // "1. Kaur Tata Usaha & Umum",
            "2. Kaur Perencanaan",
            "3. Kaur Keuangan",
            "4. Kasi Pemerintah",
            "5. Kasi Kesejahteraan",
            "6. Kasi Pelayanan", "7."
        );

        foreach ($arr as $text) {
            $this->fpdf->Cell(85, 50, '', 0, 0,);
            $this->fpdf->Cell(-10);
            $this->fpdf->Cell(60, 8.5, $text, 1, 0,);
            $this->fpdf->Cell(25, 8.5, '', 1, 0,);
            if ($text == "7.") {
                $this->fpdf->Ln(13);
            } else {
                $this->fpdf->Ln(8.5);
            }
        }

        $this->fpdf->Cell(100, 10, '', 0, 0);
        $this->fpdf->Cell(70, 10, 'Lampenai, ' . $this->tglIndo($disposisi->tgl_disposisi ?? "-"), 0, 0); //tgl disposisi
        $this->fpdf->Ln(6);

        $this->fpdf->Cell(100, 10, '', 0, 0);
        $this->fpdf->Cell(70, 10, ($disposisi->approve_by->jabatan ?? "-"), 0, 0); //jabatan
        $this->fpdf->Ln(25); //184

        $currentY = $this->fpdf->getY();
        $url = (__DIR__ . "/../../../");
        $file = $disposisi->approve_by->ttd;
        $this->fpdf->Image($url . $file, 132, $currentY - 18, 44, 24);


        $this->fpdf->Ln(4.5);
        $this->fpdf->Cell(100, 10, '', 0, 0);
        $this->fpdf->setFont('Times', 'BU', 12); // user_approve
        $this->fpdf->Cell(70, 10, strtoupper($disposisi->approve_by->name ?? "-"), 0, 0);

        $this->fpdf->Ln(-98); //isi disposisi
        $this->fpdf->Cell(-9);
        $this->fpdf->setFont('Times', '', 12);
        $this->fpdf->MultiCell(83, 6, ($disposisi->isi_disposisi ?? "-"), 0, 'J', false);

        $this->fpdf->Output();
        exit;
    }

    function printKopSurat($gambar = 'gambar/logo-lutim.png')
    {
        $this->fpdf->Image(public_path($gambar), 93, 4, 17, 20);

        $this->fpdf->Ln(16);
        $this->fpdf->Cell(73);
        $this->fpdf->SetFont('Times', 'B', 14);
        $this->fpdf->Cell(1, 5, 'PEMERINTAH KABUPATEN LUWU TIMUR', 0, 1, 'C');
        $this->fpdf->Ln(1.5);

        $this->fpdf->Cell(73);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(1, 5, 'KECAMATAN WOTU', 0, 1, 'C');
        $this->fpdf->Ln(1.5);

        $this->fpdf->Cell(73);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(1, 5, 'DESA LAMPENAI', 0, 1, 'C');

        $this->fpdf->Cell(73);
        $this->fpdf->SetFont('Times', '', 10);
        $this->fpdf->Cell(1, 5, 'Alamat : Jl. Batara Guru No. 08 Wotu (92971)', 0, 1, 'C');

        $this->fpdf->setLineWidth(0.5);
        $this->fpdf->Line(10, 49, 200, 49);
        $this->fpdf->setLineWidth(0.1);
        $this->fpdf->Line(10, 49.8, 200, 49.8);
    }

    function tglIndo($tanggal)
    {
        $bulan = array(
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );

        $pecah = explode('-', $tanggal);
        return substr($pecah[2], 0, 2) . ' ' . $bulan[(int)$pecah[1]] . ' ' . $pecah[0];
    }

    function printPenandatangan($dataSurat)
    {
        $tglIndo = $this->tglIndo($dataSurat->tgl_surat ?? "-");

        $this->fpdf->Ln(7.5);
        $this->fpdf->Cell(130);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Lampenai, ' . $tglIndo, 0, 1, 'C');

        $this->fpdf->Cell(130);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, $dataSurat->approve_by->jabatan ?? "-", 0, 1, 'C');
        $this->fpdf->Ln(20);

        $this->fpdf->Cell(130);
        $this->fpdf->SetFont('Times', 'BU', 12);
        $this->fpdf->Cell(1, 5, strtoupper($dataSurat->approve_by->name) ?? "-", 0, 1, 'C');
    }

    function insertImageTTD($filePath, $y = 200)
    {
        $url = (__DIR__ . "/../../../");
        $this->fpdf->Image($url . $filePath, 140, $y + 17, 44, 24);
    }

    function setLabelValue($label, $value, $style = "")
    {
        $this->fpdf->Cell(20);
        $this->fpdf->Cell(1, 5, $label, 0, 1, 'L');
        $this->fpdf->Ln(1);

        $this->fpdf->Cell(65);
        $this->fpdf->Cell(1, -7, ":", 0, 1, 'L');
        $this->fpdf->Ln(12);

        $this->fpdf->Cell(67);
        $this->fpdf->SetFont('Times', $style, 12);
        $this->fpdf->Cell(0, -17, $value, 0, 1, 'L');
        $this->fpdf->Ln(11.5);

        $this->fpdf->SetFont('Times', '', 12);
    }

    // todo: function GenerateSKTM
    function printBodySuratSKTM($dataSurat)
    {
        $pendaTangan = [
            "Nama" => $dataSurat->approve_by->name ?? "-",
            "Jabatan" => $dataSurat->approve_by->jabatan ?? "-",
        ];

        $dataTgl = date("d-m-Y", strtotime($dataSurat->tgl_lahir));
        $pemohon = [
            "Nama" => $dataSurat->nama_pemohon ?? "-",
            "Tempat/Tanggal Lahir" => ($dataSurat->tempat_lahir ?? "-") . ", " . ($dataTgl),
            "NIK" => $dataSurat->nik ?? "-",
            "Pekerjaan" => $dataSurat->pekerjaan ?? "-",
            "Alamat" => $dataSurat->alamat ?? "-",
        ];

        $this->fpdf->Ln(9);
        $this->fpdf->SetFont('Times', 'BU', 12);
        $this->fpdf->Cell(73);
        $this->fpdf->Cell(1, 5, 'SURAT KETERANGAN TIDAK MAMPU', 0, 1, 'C');
        $this->fpdf->Ln(0.1);

        $this->fpdf->Cell(73);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Nomor : ' . strtoupper($dataSurat->no_surat ?? "-"), 0, 1, 'C');
        $this->fpdf->Ln(12);

        // $this->fpdf->Cell(20);
        $this->fpdf->Cell(1, 5, 'Yang bertanda tangan dibawah ini:', 0, 1, 'L');
        $this->fpdf->Ln(5);

        foreach ($pendaTangan as $label => $value) {
            if ($label == 'Nama') {
                $value = strtoupper($value);
                $this->setLabelValue($label, $value, 'B');
                $this->fpdf->Ln(4);
            } else {
                $this->setLabelValue($label, $value);
                $this->fpdf->Ln(4);
            }
        }

        // $this->fpdf->Cell(20);
        $this->fpdf->Cell(1, 5, 'Menerangkan bahwa:', 0, 1, 'L');
        $this->fpdf->Ln(5);

        foreach ($pemohon as $label => $value) {
            if ($label == 'Nama') {
                $value = strtoupper($value);
                $this->setLabelValue($label, $value, 'B');
                $this->fpdf->Ln(4);
            } else {
                $this->setLabelValue($label, $value);
                $this->fpdf->Ln(4);
            }
        }

        // $this->fpdf->Cell(20);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->MultiCell(0, 7, '      Yang bersangkutan diatas adalah benar warga ' . ($dataSurat->alamat ?? "-") . ' yang menurut pengamatan dan pengetahuan kami yang bersangkutan benar-benar Tidak Mampu dan Kurang Mampu.', 0, 'J', false);
        $this->fpdf->Ln(0.5);

        // $this->fpdf->Cell(20);
        // $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->MultiCell(0, 7, '      Demikian Surat keterangan ini diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.', 0, 'J', false);
        $this->fpdf->Ln(1);
    }

    // todo: function GenerateDomisili
    function printBodySuratDomisili($dataSurat)
    {
        $pemohon = [
            "Nama" => $dataSurat->nama_pemohon ?? "-",
            "Tempat/Tanggal Lahir" => ($dataSurat->tempat_lahir ?? "-") . ", " . ($dataSurat->tgl_lahir ?? "-"), // date_format($dataSurat->tgl_lahir, "d-m-Y")
            "Jenis Kelamin" => $dataSurat->jenis_kelamin ?? "-",
            "Agama" => $dataSurat->agama ?? "-",
            "Pekerjaan" => $dataSurat->pekerjaan ?? "-",
            "Alamat" => $dataSurat->alamat ?? "-",
            "NIK" => $dataSurat->nik ?? "-",
        ];

        $this->fpdf->Ln(9);
        $this->fpdf->SetFont('Times', 'BU', 12);
        $this->fpdf->Cell(73);
        $this->fpdf->Cell(1, 5, 'SURAT KETERANGAN DOMISILI', 0, 1, 'C');
        $this->fpdf->Ln(0.1);

        $this->fpdf->Cell(73);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Nomor : ' . strtoupper($dataSurat->no_surat ?? "-"), 0, 1, 'C');
        $this->fpdf->Ln(9);

        // $this->fpdf->Cell(1);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->MultiCell(0, 7, '       Yang bertanda tangan di bawah ini ' . ($dataSurat->approve_by->jabatan ?? "-") . ' Kecamatan Wotu Kabupaten Luwu Timur menerangkan dengan sesungguhnya bahwa:', 0, 'J', false);
        $this->fpdf->Ln(5);

        foreach ($pemohon as $label => $value) {
            if ($label == 'Nama') {
                $value = strtoupper($value);
                $this->setLabelValue($label, $value, 'B');
                $this->fpdf->Ln(3);
            } else {
                $this->setLabelValue($label, $value);
                $this->fpdf->Ln(3);
            }
        }


        // $this->fpdf->Cell(10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->MultiCell(0, 7, '       Nama tersebut di atas benar adalah  penduduk ' . ($dataSurat->alamat ?? "-") . ' yang saat ini berdomisili tetap di ' . ($dataSurat->alamat_domisili ?? "-") . '.', 0, 'J', false);
        $this->fpdf->Ln(1);
    }

    // todo: function GenerateKehilangan
    function printBodySuratKehilangan($dataSurat)
    {
        $pemohon = [
            "Nama" => $dataSurat->nama_pemohon ?? "-",
            "Jenis Kelamin" => $dataSurat->jenis_kelamin ?? "-",
            "Tempat/Tanggal Lahir" => ($dataSurat->tempat_lahir ?? "-") . ", " . ($dataSurat->tgl_lahir ?? "-"), // date_format($dataSurat->tgl_lahir, "d-m-Y")
            "NIK" => $dataSurat->nik ?? "-",
            "Status" => $dataSurat->status_kawin ?? "-",
            "Agama" => $dataSurat->agama ?? "-",
            "Pekerjaan" => $dataSurat->pekerjaan ?? "-",
            "Alamat" => $dataSurat->alamat ?? "-",
        ];

        $this->fpdf->Ln(7);
        $this->fpdf->Cell(105);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Kepada', 0, 1, 'L');
        $this->fpdf->Ln(2);

        $this->fpdf->Cell(105);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Yth. Bapak Kapolsek Wotu', 0, 1, 'L');
        $this->fpdf->Ln(2);

        $this->fpdf->Cell(105);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Di', 0, 1, 'L');
        $this->fpdf->Ln(2);

        $this->fpdf->Cell(105);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, '        Wotu', 0, 1, 'L');
        $this->fpdf->Ln(2);


        $this->fpdf->Ln(-21);
        $this->fpdf->Cell(-10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Nomor', 0, 1, 'L');
        $this->fpdf->Ln(2);

        $this->fpdf->Ln(-7);
        $this->fpdf->Cell(8);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, ':', 0, 1, 'L');
        $this->fpdf->Ln(2);

        $this->fpdf->Ln(-7);
        $this->fpdf->Cell(10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, strtoupper($dataSurat->no_surat ?? "-"), 0, 1, 'L');
        $this->fpdf->Ln(2);

        $this->fpdf->Cell(-10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Lampiran', 0, 1, 'L');
        $this->fpdf->Ln(2);

        $this->fpdf->Ln(-7);
        $this->fpdf->Cell(8);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, ':', 0, 1, 'L');
        $this->fpdf->Ln(2);

        $this->fpdf->Ln(-7);
        $this->fpdf->Cell(10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, ($dataSurat->lampiran ?? "-"), 0, 1, 'L');
        $this->fpdf->Ln(2);

        $this->fpdf->Cell(-10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Perihal', 0, 1, 'L');
        $this->fpdf->Ln(2);

        $this->fpdf->Ln(-7);
        $this->fpdf->Cell(8);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, ':', 0, 1, 'L');
        $this->fpdf->Ln(2);

        $this->fpdf->Ln(-7);
        $this->fpdf->Cell(10);
        $this->fpdf->SetFont('Times', 'BU', 12);
        $this->fpdf->Cell(1, 5, ($dataSurat->jenis_surat ?? "-"), 0, 1, 'L');
        $this->fpdf->Ln(2);


        $this->fpdf->Ln(11);
        $this->fpdf->Cell(-10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->MultiCell(0, 7, '       Yang bertanda tangan di bawah ini ' . ($dataSurat->approve_by->jabatan ?? "-") . ' Kecamatan Wotu Kabupaten Luwu Timur. Menerangkan dengan sebenarnya bahwa :', 0, 'J', false);
        $this->fpdf->Ln(4);

        foreach ($pemohon as $label => $value) {
            if ($label == 'Nama') {
                $value = strtoupper($value);
                $this->setLabelValue($label, $value, 'B');
                $this->fpdf->Ln(3);
            } else {
                $this->setLabelValue($label, $value);
                $this->fpdf->Ln(3);
            }
        }

        $this->fpdf->Ln(4);
        $this->fpdf->Cell(-10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->MultiCell(0, 7, '       Nama tersebut di atas benar adalah penduduk Desa Lampenai Kec. Wotu Kab. Luwu Timur dan nama tersebut benar memiliki ' . ($dataSurat->benda_hilang ?? "-") . ' dan ' .  ($dataSurat->benda_hilang ?? "-") . ' tersebut telah hilang atau tercecer di sekitar Kecamatan Wotu.', 0, 'J', false);
        $this->fpdf->Ln(1);

        $this->fpdf->Cell(-10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(0, 7, '       Demikian surat keterangan ini kami buat untuk ditindak lanjuti.', 0, 1, '');
    }

    // todo: function GenerateKematian
    function printBodySuratKematian($dataSurat)
    {
        $pemohon = [
            "Nama" => $dataSurat->nama_pemohon ?? "-",
            "NIK" => $dataSurat->nik ?? "-",
            "No. KK" => $dataSurat->no_kk ?? "-",
            "Tempat/Tanggal Lahir" => ($dataSurat->tempat_lahir ?? "-") . ", " . ($dataSurat->tgl_lahir ?? "-"), // date_format($dataSurat->tgl_lahir, "d-m-Y")
            "Jenis Kelamin" => $dataSurat->jenis_kelamin ?? "-",
            "Kewarganegaraan" => $dataSurat->warga_negara ?? "-",
            "Agama" => $dataSurat->agama ?? "-",
            "Status Perkawinan" => $dataSurat->status_kawin ?? "-",
            "Pekerjaan" => $dataSurat->pekerjaan ?? "-",
            "Alamat" => $dataSurat->alamat ?? "-",
        ];

        $dataMati = [
            "Hari/Tanggal" => ($dataSurat->hari_mati ?? "-") . ", " . ($dataSurat->tgl_mati ?? "-"), // date_format($dataSurat->tgl_lahir, "d-m-Y")
            "Tempat Kematian" => $dataSurat->tempat_mati ?? "-",
            "Kecamatan" => $dataSurat->kecamatan ?? "-",
            "Kabupaten/Kota" => $dataSurat->kabupaten ?? "-",
            "Provinsi" => $dataSurat->provinsi ?? "-",
            "Sebab Kematian" => $dataSurat->sebab_mati ?? "-",
            "Yang Menentukan" => "...........................................",
            "Keterangan Visum" => "...........................................",
        ];

        $this->fpdf->Ln(4.5);
        $this->fpdf->SetFont('Times', 'BU', 12);
        $this->fpdf->Cell(73);
        $this->fpdf->Cell(1, 5, 'SURAT KETERANGAN KEMATIAN', 0, 1, 'C');
        $this->fpdf->Ln(0.1);

        $this->fpdf->Cell(73);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Nomor : ' . strtoupper($dataSurat->no_surat ?? "-"), 0, 1, 'C');
        $this->fpdf->Ln(4);

        // $this->fpdf->Ln(2);
        // $this->fpdf->Cell(10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->MultiCell(0, 6, '       Yang bertanda tangan di bawah ini ' . ($dataSurat->approve_by->jabatan ?? "-") . ' Lampenai menerangkan dengan sesungguhnya bahwa:', 0, 'J', false);
        $this->fpdf->Ln(2);

        foreach ($pemohon as $label => $value) {
            if ($label == 'Nama') {
                $value = strtoupper($value);
                $this->setLabelValue($label, $value, 'B');
                $this->fpdf->Ln(1.5);
            } else {
                $this->setLabelValue($label, $value);
                $this->fpdf->Ln(1.5);
            }
        }

        // $this->fpdf->Ln(1.5);
        // $this->fpdf->Cell(10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(0, 7, 'Telah meninggal dunia pada:', 0, 1, 'L');
        $this->fpdf->Ln(1.5);

        foreach ($dataMati as $label => $value) {
            $this->setLabelValue($label, $value);
            $this->fpdf->Ln(1.5);
        }

        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(0, 7, 'Demikian Surat Keterangan Kematian ini kami buat untuk dipergunakan seperlunya.', 0, 1, 'L');
        // $this->fpdf->Ln(1.5);
    }
}
