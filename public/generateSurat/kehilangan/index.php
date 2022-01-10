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
        $pdf->content1( //tujuan surat
            'Kepada',
            'Yth. Bapak Kapolsek Wotu',
            'Di',
            '        Wotu',

        );

        $pdf->content2( //nomor, lampiran, perihal
            'Nomor', ':', '1234',
            'Lampiran', ':', '-',
            'Perihal', ':', 'Surat Keterangan Kehilangan'

            
        );

        $pdf->content3(
            '         Yang bertanda tangan di bawah ini Kepala Desa Lampenai Kecamatan Wotu Kabupaten Luwu Timur. Menerangkan dengan sebenarnya bahwa :',
        );

        $pdf->content4(
            'Nama', ':', 'Baharuddin Kasim',
            'Jenis Kelamin', ':', 'Laki-Laki',
            'Tempat / Tgl Lahir', ':', 'tempat',
            'NIK', ':', '134134343355',
            'Status', ':', 'Kawin',
            'Agama', ':', 'Islam',
            'Pekerjaan', ':', 'Kerja',
            'Alamat', ':', 'alamat',
        );

        $pdf->content5(
            '         Nama tersebut diatas benar adalah Penduduk Desa Lampenai Kec. Wotu Kab. Luwu Timur dan nama tersebut di atas benar memiliki ATM BANK SULSELBAR dan ATM BANK SULSELBAR Tersebut Telah Hilang atau tercecer di sekitar Kecamatan Wotu.',
            'Demikian surat keterangan ini kami buat untuk ditindak lanjuti.',
        );

        $pdf->content6(
            'Lampenai, 09 Januari 2021',
            'Kepala Desa Lampenai',
            'ZAENAL BACHRIE'
        );
    //}

    
    

    $pdf->output();


?>