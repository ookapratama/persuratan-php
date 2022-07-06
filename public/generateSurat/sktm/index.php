<?php
// memanggil library FPDF
require('../../lib/fpdf.php');
require('function.php');
include '../koneksi.php';

$data = base64_decode($_REQUEST['data']);
$surat = mysqli_query($connect, "SELECT surat_ket_tidak_mampus.id, no_surat, user_approve, UPPER(users.name) AS nama, users.jabatan, UPPER(nama_pemohon) AS nama_pemohon, tempat_lahir, tgl_lahir, nik, pekerjaan, alamat, tgl_surat FROM surat_ket_tidak_mampus JOIN users ON(users.id = surat_ket_tidak_mampus.user_approve) WHERE surat_ket_tidak_mampus.id='$data'");
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
    $pdf->content(
        'SURAT KETERANGAN TIDAK MAMPU', //1
        'Nomor : ' . $row['no_surat'],
        'Yang bertanda tangan di bawah ini:',
        'Nama',
        $row['nama'], //5
        'Jabatan',
        $row['jabatan'],
        'Menerangkan bahwa:',
        'Nama',
        $row['nama_pemohon'], //10
        'Tempat/Tanggal Lahir',
        $row['tempat_lahir'] . ", " . $pdf->tgl_indo($row['tgl_lahir']),
        'NIK',
        $row['nik'],
        'Pekerjaan', //15
        $row['pekerjaan'],
        'Alamat',
        $row['alamat'],
        '         Yang bersangkutan diatas adalah benar warga ' . $row['alamat'] . ' yang menurut pengamatan dan pengetahuan kami yang bersangkutan benar-benar Tidak Mampu dan Kurang Mampu.',
        '         Demikian Surat keterangan ini diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.', //20
        'Lampenai, ' . $pdf->tgl_indo($row['tgl_surat']),
        $row['jabatan'],
        $row['nama'],
        ':',
        ':',
        ':',
        ':',
        ':',
        ':',
        ':'
    );

    $pdf->ttd('../../gambar/ttd2.png'); //ttd
}




$pdf->output();
