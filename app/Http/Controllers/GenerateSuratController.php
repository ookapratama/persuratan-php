<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Surat\SuratKetTidakMampu as Surat;

class GenerateSuratController extends Controller
{
    private $fpdf;
    public function __construct()
    {
        $this->fpdf = new Fpdf;
        $this->fpdf->AddPage('P', 'A4');
        $this->fpdf->SetMargins(10, 10, 20);
        // $this->fpdf->AddPage('P', 'A4');
    }

    // main function
    function generateSurat($type = "sktm", $id = 85)
    {
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
        $this->printPenandatangan();
        $this->insertImageTTD('/gambar/ttd2.png', $currentY);

        $this->fpdf->Output();
        exit;
    }

    function printKopSurat($gambar = 'gambar/logo-lutim.png')
    {
        $this->fpdf->Image(public_path($gambar), 93, 4, 17, 20);

        $this->fpdf->Ln(16);
        $this->fpdf->Cell(93);
        $this->fpdf->SetFont('Times', 'B', 14);
        $this->fpdf->Cell(1, 5, 'PEMERINTAH KABUPATEN LUWU TIMUR', 0, 1, 'C');
        $this->fpdf->Ln(1.5);

        $this->fpdf->Cell(93);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(1, 5, 'KECAMATAN WOTU', 0, 1, 'C');
        $this->fpdf->Ln(1.5);

        $this->fpdf->Cell(93);
        $this->fpdf->SetFont('Times', 'B', 16);
        $this->fpdf->Cell(1, 5, 'DESA LAMPENAI', 0, 1, 'C');

        $this->fpdf->Cell(93);
        $this->fpdf->SetFont('Times', '', 10);
        $this->fpdf->Cell(1, 5, 'Alamat : Jl. Batara Guru No. 08 Wotu (92971)', 0, 1, 'C');

        $this->fpdf->setLineWidth(0.5);
        $this->fpdf->Line(10, 49, 200, 49);
        $this->fpdf->setLineWidth(0.1);
        $this->fpdf->Line(10, 49.8, 200, 49.8);
    }

    function printPenandatangan()
    {
        $this->fpdf->Ln(9);
        $this->fpdf->Cell(150);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Lampenai, 20 Agustus 2022', 0, 1, 'C');

        $this->fpdf->Cell(150);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Kepala Desa Lampenai', 0, 1, 'C');
        $this->fpdf->Ln(20);

        $this->fpdf->Cell(150);
        $this->fpdf->SetFont('Times', 'BU', 12);
        $this->fpdf->Cell(1, 5, 'Baharuddin Kasim', 0, 1, 'C');
    }

    function insertImageTTD($filePath = '/gambar/ttd2.png', $y = 200)
    {
        $this->fpdf->Image(public_path($filePath), 140, $y + 17, 44, 24);
    }

    function setLabelValue($label, $value, $style = "")
    {
        $this->fpdf->Cell(35);
        $this->fpdf->Cell(1, 5, $label, 0, 1, 'L');
        $this->fpdf->Ln(1);

        $this->fpdf->Cell(80);
        $this->fpdf->Cell(1, -7, ":", 0, 1, 'L');
        $this->fpdf->Ln(12);

        $this->fpdf->Cell(82);
        $this->fpdf->SetFont('Times', $style, 12);
        $this->fpdf->Cell(0, -17, $value, 0, 1, 'L');
        $this->fpdf->Ln(17);
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
        $this->fpdf->Cell(93);
        $this->fpdf->Cell(1, 5, 'SURAT KETERANGAN TIDAK MAMPU', 0, 1, 'C');
        $this->fpdf->Ln(0.1);

        $this->fpdf->Cell(93);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Nomor : 123456789', 0, 1, 'C');
        $this->fpdf->Ln(12);

        $this->fpdf->Cell(20);
        $this->fpdf->Cell(1, 5, 'Yang bertanda tangan', 0, 1, 'L');
        $this->fpdf->Ln(5);

        foreach ($pendaTangan as $label => $value) {
            $this->setLabelValue($label, $value);
        }

        $this->fpdf->Cell(20);
        $this->fpdf->Cell(1, 5, 'Menerangkan bahwa:', 0, 1, 'L');
        $this->fpdf->Ln(5);

        foreach ($pemohon as $label => $value) {
            $this->setLabelValue($label, $value);
        }

        $this->fpdf->Cell(20);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->MultiCell(0, 7, '      Yang bersangkutan diatas adalah benar warga ' . ($dataSurat->alamat ?? "-") . ' yang menurut pengamatan dan pengetahuan kami yang bersangkutan benar-benar Tidak Mampu dan Kurang Mampu.', 0, 1, '');
        $this->fpdf->Ln(0.5);

        $this->fpdf->Cell(20);
        // $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->MultiCell(0, 7, '      Demikian Surat keterangan ini diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.', 0, 1, '');
        $this->fpdf->Ln(10);
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
        $this->fpdf->Cell(93);
        $this->fpdf->Cell(1, 5, 'SURAT KETERANGAN DOMISILI', 0, 1, 'C');
        $this->fpdf->Ln(0.1);

        $this->fpdf->Cell(93);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->Cell(1, 5, 'Nomor : ' . ($dataSurat->no_surat ?? "-"), 0, 1, 'C');
        $this->fpdf->Ln(12);

        $this->fpdf->Cell(10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->MultiCell(0, 7, 'Yang bertanda tangan di bawah ini ' . ($dataSurat->approve_by->jabatan ?? "-") . ' Kecamatan Wotu Kabupaten Luwu Timur menerangkan dengan sesungguhnya bahwa:', 0, 1, '');
        $this->fpdf->Ln(5);

        foreach ($pemohon as $label => $value) {
            $this->setLabelValue($label, $value);
        }

        $this->fpdf->Cell(10);
        $this->fpdf->SetFont('Times', '', 12);
        $this->fpdf->MultiCell(0, 7, 'Nama tersebut di atas benar adalah  penduduk ' . ($dataSurat->alamat ?? "-") . ' yang saat ini berdomisili tetap di ' . ($dataSurat->alamat_domisili ?? "-") . '.', 0, 1, '');
        $this->fpdf->Ln(1);
    }

    // todo: function GenerateKeteranganTidakMampu
    // todo: function GenerateKeteranganTidakMampu
}
