<?php
// memanggil library FPDF
require('../../lib/fpdf.php');
require('function.php');
include '../koneksi.php';

$data = base64_decode($_REQUEST['data']);
$surat = mysqli_query($connect, "SELECT surat_ket_tidak_mampus.id, no_surat, user_approve, UPPER(users.name) AS nama, users.jabatan, UPPER(nama_bayi) AS nama_bayi, jenis_kelamin, hari_lahir, pukul_lahir, UPPER(nama_ibu) AS nama_ibu, UPPER(nama_ayah) AS nama_ayah, nik_ibu, nik_ayah, kecamatan, kabupaten, tempat_lahir, tgl_lahir, alamat, tgl_surat FROM surat_ket_tidak_mampus JOIN users ON(users.id = surat_ket_tidak_mampus.user_approve) WHERE surat_ket_tidak_mampus.id='$data'");
if ($surat->num_rows == 0) {
    exit('data tidak ditemukan');
}

// intance object dan memberikan pengaturan halaman PDF
$pdf = new pdf();


$pdf->SetMargins(10, 10, 20);

// membuat halaman baru
$pdf->AddPage('P', 'A4');

// $pdf->SetAutoPageBreak(true,5);

// mencetak string
$pdf->kop(
    'PEMERINTAH KABUPATEN LUWU TIMUR',
    'KECAMATAN WOTU',
    'DESA LAMPENAI',
    'Alamat : Jl. Batara Guru No. 08 Wotu (92971)'
);

//atur garis kop
$pdf->setLineWidth(0.5);
$pdf->Line(10, 49, 200, 49);
$pdf->setLineWidth(0.1);
$pdf->Line(10, 49.8, 200, 49.8);

$pdf->logo('../../gambar/logo-lutim.png');


while ($row = mysqli_fetch_array($surat)) {

    $pdf->content1( //tujuan surat
        'SURAT KETERANGAN LAHIR',
        'Nomor : ' . $row['no_surat'],
    );

    $pdf->content2( //tujuan surat
        'Menerangkan bahwa pada hari ini ' . $row['hari_lahir'] . ', tanggal ' . $pdf->tgl_indo($row['tgl_lahir']) . ', Pukul ' . $row['pukul_lahir'] . ' WITA. Telah lahir seorang bayi ' . $row['jenis_kelamin'] . ' di ' . $row['tempat_lahir'] . ', yang bernama:'
    );

    $pdf->content3(
        $row['nama_bayi']
    );

    $pdf->content4(
        'Dari orang tua:'
    );

    $pdf->content5(
        'Nama Ibu',
        ':',
        $row['nama_ibu'],
        'NIK',
        ':',
        $row['nik_ibu'],
        'Nama Ayah',
        ':',
        $row['nama_ayah'],
        'NIK',
        ':',
        $row['nik_ayah'],
        'Alamat',
        ':',
        $row['alamat'],
        'Kecamatan',
        ':',
        $row['kecamatan'],
        'Kab/Kota',
        ':',
        $row['kabupaten']
    );

    $pdf->content6(
        'Lampenai ' . $pdf->tgl_indo($row['tgl_surat']),
        $row['jabatan'],
        $row['nama'],
    );

    $pdf->ttd('../../gambar/ttd2.png'); //ttd



}

$pdf->output();
