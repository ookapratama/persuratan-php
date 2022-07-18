<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Surat\SuratKetTidakMampu as Surat;
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
                //   $this->printBodySuratSKTM($surat);
                break;
        }

        // Bagian TTD
        $currentY = $this->fpdf->getY();
        $this->printPenandatangan($surat);
        $this->insertImageTTD($surat->approve_by->ttd, $currentY);

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

    // function tglIndo($tanggal)
    // {
    //     $bulan = array(
    //         1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    //     );

    //     $pecah = explode('-', $tanggal);
    //     return $pecah[2] . ' ' . $bulan[(int)$pecah[1]] . ' ' . $pecah[0];
    // }

    function printPenandatangan($dataSurat)
    {
        //set tgl indo
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $tglIndo = strftime("%d %B %Y", strtotime($dataSurat->tgl_surat ?? "-"));

        $this->fpdf->Ln(9);
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
        $this->fpdf->Ln(16);

        $this->fpdf->SetFont('Times', '', 12);
    }

    // todo: function GenerateSKTM
    function printBodySuratSKTM($dataSurat)
    {
        $pendaTangan = [
            "Nama" => $dataSurat->approve_by->name ?? "-",
            "Jabatan" => $dataSurat->approve_by->jabatan ?? "-",
        ];

        $pemohon = [
            "Nama" => $dataSurat->nama_pemohon ?? "-",
            "Tempat/Tanggal Lahir" => ($dataSurat->tempat_lahir ?? "-") . ", " . ($dataSurat->tgl_lahir ?? "-"), // date_format($dataSurat->tgl_lahir, "d-m-Y") 
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
        $this->fpdf->Cell(1, 5, 'Nomor : ' . ($dataSurat->no_surat ?? "-"), 0, 1, 'C');
        $this->fpdf->Ln(12);

        // $this->fpdf->Cell(20);
        $this->fpdf->Cell(1, 5, 'Yang bertanda tangan dibawah ini:', 0, 1, 'L');
        $this->fpdf->Ln(5);

        foreach ($pendaTangan as $label => $value) {
            if ($label == 'Nama') {
                $value = strtoupper($value);
                $this->setLabelValue($label, $value, 'B');
            } else {
                $this->setLabelValue($label, $value);
            }
        }

        // $this->fpdf->Cell(20);
        $this->fpdf->Cell(1, 5, 'Menerangkan bahwa:', 0, 1, 'L');
        $this->fpdf->Ln(5);

        foreach ($pemohon as $label => $value) {
            if ($label == 'Nama') {
                $value = strtoupper($value);
                $this->setLabelValue($label, $value, 'B');
            } else {
                $this->setLabelValue($label, $value);
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
        $this->fpdf->Cell(1, 5, 'Nomor : ' . ($dataSurat->no_surat ?? "-"), 0, 1, 'C');
        $this->fpdf->Ln(9);

        // $this->fpdf->Cell(1);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->MultiCell(0, 7, '       Yang bertanda tangan di bawah ini ' . ($dataSurat->approve_by->jabatan ?? "-") . ' Kecamatan Wotu Kabupaten Luwu Timur menerangkan dengan sesungguhnya bahwa:', 0, 'J', false);
        $this->fpdf->Ln(5);

        foreach ($pemohon as $label => $value) {
            if ($label == 'Nama') {
                $value = strtoupper($value);
                $this->setLabelValue($label, $value, 'B');
            } else {
                $this->setLabelValue($label, $value);
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
        $this->fpdf->Cell(1, 5, ($dataSurat->no_surat ?? "-"), 0, 1, 'L');
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
            } else {
                $this->setLabelValue($label, $value);
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

    // todo: function GenerateKeteranganTidakMampu
}
