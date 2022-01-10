<?php
    // memanggil library FPDF
    require('../../lib/fpdf.php');
    require('function.php');    
    include '../koneksi.php';

    $data = base64_decode($_REQUEST['data']);
    $surat = mysqli_query($connect, "select * from surat_ket_tidak_mampus where id='$data'");
    if($surat->num_rows == 0) {
        exit('data tidak ditemukan');
    }
    // intance object dan memberikan pengaturan halaman PDF
    $pdf = new pdf();

    
    $pdf->SetMargins(10,10,20);

    // membuat halaman baru
    $pdf->AddPage('P','A4');

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
    $pdf->Line(10,33,200,33);
    $pdf->setLineWidth(0.1);
    $pdf->Line(10,33.8,200,33.8);

    $pdf->logo('../../gambar/logo-lutim.png');

    
    while ($row = mysqli_fetch_array($surat)) {
        $pdf->content(
            'SURAT KETERANGAN TIDAK MAMPU',//1
            'Nomor : '.$row['no_surat'],
            'Yang bertanda tangan di bawah ini:',
            'Nama',
            '  BAHARUDDIN KASIM',//5
            'Jabatan',
            '  Kepala Desa Misalnya !',
            'Menerangkan bahwa:',
            'Nama',
            $row['nama_pemohon'],//10
            'Tempat/Tanggal Lahir',
            $row['tempat_lahir'].", ".$row['tgl_lahir'],
            'NIK',
            $row['nik'],
            'Pekerjaan',//15
            $row['pekerjaan'],
            'Alamat',
            $row['alamat'],
            '         Yang bersangkutan diatas adalah benar warga '.$row['alamat'].' yang menurut pengamatan dan pengetahuan kami yang bersangkutan benar-benar Tidak Mampu dan Kurang Mampu.',
            '         Demikian Surat keterangan ini diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.',//20
            'Lampenai, 08 Januari 2022',
            'Kepala Desa Lampenai',
            'BAHARUDDIN KASIM',
            ':', ':', ':', ':', ':', ':', ':'
        );
    }

    
    

    $pdf->output();


?>