<?php
// memanggil library FPDF
require('../../lib/fpdf.php');
require('function.php');
include '../koneksi.php';

$data = base64_decode($_REQUEST['data']);
$disposisi = mysqli_query($connect, "SELECT tbl_disposisi.id, user_approve, UPPER(users.name) AS nama, users.jabatan, perihal, DATE_FORMAT(tgl_surat, '%d-%m-%Y') AS tgl_surat, UPPER(no_surat) AS no_surat, kode_surat, asal_surat, isi_ringkas, DATE_FORMAT(tgl_terima, '%d-%m-%Y') AS tgl_terima, DATE_FORMAT(tgl_selesai, '%d-%m-%Y') AS tgl_selesai, isi_disposisi, tgl_disposisi FROM tbl_disposisi JOIN users ON(users.id = tbl_disposisi.user_approve) where tbl_disposisi.id='$data'");
if ($disposisi->num_rows == 0) {
    exit('data tidak ditemukan');
}

// intance object dan memberikan pengaturan halaman PDF
$pdf = new pdf('P', 'mm', 'A4');


$pdf->SetMargins(20, 10, 20);

// membuat halaman baru
$pdf->AddPage();

// $pdf->SetAutoPageBreak(true,5);

// mencetak string
$pdf->kop(
    'LEMBAR DISPOSISI'
);

while ($row = mysqli_fetch_array($disposisi)) {

    $pdf->setFont('Times', '', 12);

    $pdf->Cell(85, 10, 'Indeks : ' . $row['perihal'], 1, 0); // perihal
    $pdf->Cell(85, 10, 'Kode : ' . $row['kode_surat'], 1, 0); //kode surat
    $pdf->Ln(10);

    $pdf->Cell(170, 180, '', 1, 0);
    $pdf->Ln(0);

    $pdf->Cell(42, 10, 'Tanggal/Nomor', 0, 0); //tgl dan no surat
    $pdf->Cell(2, 10, ':', 0, 0);
    $pdf->Cell(126, 10, $row['tgl_surat'] . ' / ' . $row['no_surat'], 0, 0);
    $pdf->Ln(10);

    $pdf->Cell(42, 10, 'Asal Surat', 0, 0); // asal surat
    $pdf->Cell(2, 10, ':', 0, 0);
    $pdf->Cell(126, 10, $row['asal_surat'], 0, 0);
    $pdf->Ln(10);

    $pdf->Cell(42, 10, 'Diterima Tanggal', 0, 0); // tgl terima
    $pdf->Cell(2, 10, ':', 0, 0);
    $pdf->Cell(126, 10, $row['tgl_terima'], 0, 0);
    $pdf->Ln(10);

    $pdf->Cell(42, 10, 'Tanggal Penyelesaian', 0, 0); //tgl selesai
    $pdf->Cell(2, 10, ':', 0, 0);
    $pdf->Cell(126, 10, $row['tgl_selesai'], 0, 0);
    $pdf->Ln(10);

    $pdf->Cell(42, 10, 'Isi Ringkas', 0, 0,); // isi ringkas
    $pdf->Cell(2, 10, ':', 0, 0);
    $pdf->MultiCell(126, 10, $row['isi_ringkas'], 0, 'L', false);

    $pdf->Cell(85, 14, 'ISI DISPOSISI', 1, 0, 'C');
    $pdf->Cell(85, 7, 'Disalurkan', 1, 0, 'C');
    $pdf->Ln(7);
    $pdf->Cell(85, 7, '', 0, 0,);
    $pdf->Cell(60, 7, 'Kepada', 1, 0, 'C');
    $pdf->Cell(25, 7, 'Paraf', 1, 0, 'C');
    $pdf->Ln(7);

    $pdf->Cell(85, 8.5, '', 0, 1);
    $pdf->Ln(-8.5);
    $pdf->Cell(85, 59.5, '', 1, 0,);
    $pdf->Cell(60, 8.5, '1. Kaur Tata Usaha & Umum', 1, 0,);
    $pdf->Cell(25, 8.5, '', 1, 0,);
    $pdf->Ln(8.5);

    $pdf->Cell(85, 50, '', 0, 0,);
    $pdf->Cell(60, 8.5, '2. Kaur Perencanaan', 1, 0,);
    $pdf->Cell(25, 8.5, '', 1, 0,);
    $pdf->Ln(8.5);

    $pdf->Cell(85, 50, '', 0, 0,);
    $pdf->Cell(60, 8.5, '3. Kaur Keuangan', 1, 0,);
    $pdf->Cell(25, 8.5, '', 1, 0,);
    $pdf->Ln(8.5);

    $pdf->Cell(85, 50, '', 0, 0,);
    $pdf->Cell(60, 8.5, '4. Kasi Pemerintah', 1, 0,);
    $pdf->Cell(25, 8.5, '', 1, 0,);
    $pdf->Ln(8.5);

    $pdf->Cell(85, 50, '', 0, 0,);
    $pdf->Cell(60, 8.5, '5. Kasi Kesejahteraan', 1, 0,);
    $pdf->Cell(25, 8.5, '', 1, 0,);
    $pdf->Ln(8.5);

    $pdf->Cell(85, 50, '', 0, 0,);
    $pdf->Cell(60, 8.5, '6. Kasi Pelayanan', 1, 0,);
    $pdf->Cell(25, 8.5, '', 1, 0,);
    $pdf->Ln(8.5);

    $pdf->Cell(85, 50, '', 0, 0,);
    $pdf->Cell(60, 8.5, '7.', 1, 0,);
    $pdf->Cell(25, 8.5, '', 1, 0,);
    $pdf->Ln(13);

    $pdf->Cell(100, 10, '', 0, 0);
    $pdf->Cell(70, 10, 'Lampenai, ' . $pdf->tgl_indo($row['tgl_disposisi']), 0, 0); //tgl disposisi
    $pdf->Ln(6);

    $pdf->Cell(100, 10, '', 0, 0);
    $pdf->Cell(70, 10, $row['jabatan'], 0, 0); //jabatan
    $pdf->Ln(25);

    $pdf->ttd('../../gambar/ttd2.png'); //ttd

    $pdf->Cell(100, 10, '', 0, 0);
    $pdf->setFont('Times', 'BU', 12); // user_approve
    $pdf->Cell(70, 10, $row['nama'], 0, 0);

    $pdf->Ln(-95); //isi disposisi
    $pdf->setFont('Times', '', 12);
    $pdf->MultiCell(85, 10, $row['isi_disposisi'], 0, 'L', false);
}

$pdf->output();
