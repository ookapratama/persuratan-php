<?php
// memanggil library FPDF
require('../../lib/fpdf.php');
require('function.php');
include '../koneksi.php';

$data = base64_decode($_REQUEST['data']);
$surat = mysqli_query($connect, "SELECT surat_ket_tidak_mampus.id, no_surat, lampiran, perihal, user_approve, UPPER(users.name) AS nama, users.jabatan, UPPER(nama_pemohon) AS nama_pemohon, jenis_kelamin, tempat_lahir, tgl_lahir, nik, status_kawin, agama, pekerjaan, alamat, UPPER(benda_hilang) AS benda_hilang, tgl_surat FROM surat_ket_tidak_mampus JOIN users ON(users.id = surat_ket_tidak_mampus.user_approve) WHERE surat_ket_tidak_mampus.id='$data'");
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
        'Kepada',
        'Yth. Bapak Kapolsek Wotu',
        'Di',
        '        Wotu',

    );

    $pdf->content2( //nomor, lampiran, perihal
        'Nomor',
        ':',
        $row['no_surat'],
        'Lampiran',
        ':',
        $row['lampiran'],
        'Perihal',
        ':',
        $row['perihal']


    );

    $pdf->content3(
        '         Yang bertanda tangan di bawah ini Kepala Desa Lampenai Kecamatan Wotu Kabupaten Luwu Timur. Menerangkan dengan sebenarnya bahwa :',
    );

    $pdf->content4(
        'Nama',
        ':',
        $row['nama_pemohon'],
        'Jenis Kelamin',
        ':',
        $row['jenis_kelamin'],
        'Tempat / Tgl Lahir',
        ':',
        $row['tempat_lahir'] . ", " . $pdf->tgl_indo($row['tgl_lahir']),
        'NIK',
        ':',
        $row['nik'],
        'Status',
        ':',
        $row['status_kawin'],
        'Agama',
        ':',
        $row['agama'],
        'Pekerjaan',
        ':',
        $row['pekerjaan'],
        'Alamat',
        ':',
        $row['alamat'],
    );

    $pdf->content5(
        '         Nama tersebut di atas benar adalah Penduduk Desa Lampenai Kec. Wotu Kab. Luwu Timur dan nama tersebut benar memiliki ' . $row['benda_hilang'] . ' dan ' .  $row['benda_hilang'] . ' tersebut telah hilang atau tercecer di sekitar Kecamatan Wotu.',
        '         Demikian surat keterangan ini kami buat untuk ditindak lanjuti.',
    );

    $pdf->content6(
        'Lampenai, ' . $pdf->tgl_indo($row['tgl_surat']),
        $row['jabatan'],
        $row['nama'],
    );

    $pdf->ttd('../../gambar/ttd2.png'); //ttd

}




$pdf->output();
