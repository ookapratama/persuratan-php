<?php
    // memanggil library FPDF
    require('../../lib/fpdf.php');
    require('function.php');    
    include '../koneksi.php';

    // $data = base64_decode($_REQUEST['data']);
    // $surat = mysqli_query($connect, "select * from surat_ket_tidak_mampus where id='$data'");
    // if($surat->num_rows == 0) {
    //     exit('data tidak ditemukan');
    // }

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

    
    // while ($row = mysqli_fetch_array($surat)) {
        $pdf->content1(
            'SURAT KETERANGAN DOMISILI',
            'Nomor : 1234',

        );

        $pdf->content2(
            '         Yang bertanda tangan di bawah ini Kepala Desa Lampenai Kecamatan Wotu Kabupaten Luwu Timur menerangkan dengan sesungguhnya bahwa :',
        );

        $pdf->content3(
            'Nama', ':', 'MELISA',
            'Tempat/Tgl. Lahir', ':', 'Wotu, 03 Okotber 1999',
            'Jenis Kelamin', ':', 'Perempuan',
            'Agama', ':', 'Kristen',
            'Pekerjaan', ':', 'Pelajar/Mahasiswa',
            'Alamat', ':', 'alamat',
            'NIK', ':', '7324064310990001'
        );

        $pdf->content4(
            '         Nama tersebut diatas benar adalah Penduduk Dsn Kau, Desa Lampenai, Kec.Wotu Kab. Luwu Timur yang Sampai saat ini berdomisili di Dusun Kau, Desa Lampenai, Kecamatan Wotu, Kabupaten Luwu Timur.',
            '         Demikian Surat Keterangan ini kami buat untuk digunakan sebagaimana mestinya.'
        );

        $pdf->content5(
            'Lampenai, 09 Januari 2021',
            'Kepala Desa Lampenai',
            'ZAENAL BACHRIE'
        );
    //}

    
    

    $pdf->output();


?>