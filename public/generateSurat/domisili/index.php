<?php
// memanggil library FPDF
require('../../lib/fpdf.php');
require('function.php');
include '../koneksi.php';

$data = base64_decode($_REQUEST['data']);
$surat = mysqli_query($connect, "SELECT surat_ket_tidak_mampus.id, UPPER(no_surat) AS no_surat, user_approve, UPPER(users.name) AS nama, users.jabatan, UPPER(nama_pemohon) AS nama_pemohon, jenis_kelamin, tempat_lahir, DATE_FORMAT(tgl_lahir, '%d-%m-%Y') AS tgl_lahir, nik, agama, pekerjaan, alamat, tgl_surat FROM surat_ket_tidak_mampus JOIN users ON(users.id = surat_ket_tidak_mampus.user_approve) WHERE surat_ket_tidak_mampus.id='$data'");
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

    $pdf->content1(
        'SURAT KETERANGAN DOMISILI',
        'Nomor : ' . $row['no_surat'],
    );

    $pdf->content2(
        '         Yang bertanda tangan di bawah ini ' . $row['jabatan'] . ' Kecamatan Wotu Kabupaten Luwu Timur menerangkan dengan sesungguhnya bahwa:'
    );

    $pdf->content3(
        'Nama',
        ':',
        $row['nama_pemohon'],
        'Tempat/Tgl. Lahir',
        ':',
        $row['tempat_lahir'] . ', ' . $row['tgl_lahir'],
        'Jenis Kelamin',
        ':',
        $row['jenis_kelamin'],
        'Agama',
        ':',
        $row['agama'],
        'Pekerjaan',
        ':',
        $row['pekerjaan'],
        'Alamat',
        ':',
        $row['alamat'],
        'NIK',
        ':',
        $row['nik']
    );

    $pdf->content4(
        '         Nama tersebut di atas benar adalah  penduduk ' . $row['alamat'] . ' Kab. Luwu Timur yang sampai saat ini berdomisili di ' . $row['alamat'] . ' Kab. Luwu Timur.'
    );

    $pdf->content5(
        '         Demikian surat keterangan ini kami buat untuk digunakan sebagaimana mestinya.'
    );

    $pdf->content6(
        'Lampenai, ' . $pdf->tgl_indo($row['tgl_surat']),
        $row['jabatan'],
        $row['nama'],
    );

    $pdf->ttd('../../gambar/ttd2.png'); //ttd



}

$pdf->output();
