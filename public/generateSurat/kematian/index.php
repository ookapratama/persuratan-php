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
            'SURAT KETERANGAN KEMATIAN',
            'Nomor : 1234',

        );

        $pdf->content2(
            '         Yang bertanda tangan di bawah ini Kepala Desa Lampenai menerangkan dengan sesungguhnya bahwa :',
        );

        $pdf->content3(
            'Nama', ':', 'BACO BECCE',
            'No. Induk Kependudukan', ':', '7324063004930001',
            'No. Kartu Keluarga', ':', '7324063004930001',
            'Tempat/Tgl Lahir', ':', 'Wotu, 30 April 1993',
            'Jenis Kelamin', ':', 'Laki-Laki',
            'Kewarganegaraan', ':', 'Indonesia',
            'Agama', ':', 'Islam',
            'Status Perkawinan', ':', 'Belum Kawain',
            'Pekerjaan', ':', 'Kerja',
            'Alamat', ':', 'alamat'
        );

        $pdf->content4(
            '         Telah meninggal dunia pada :'
        );

        $pdf->content5(
            'Hari/Tanggal', ':', 'Jumat, 30 Juni 2021',
            'Tempat Kematian', ':', 'RS I LAGALIGO',
            'Kecamatan', ':', 'Wotu',
            'Kabupaten/Kota', ':', 'Luwu Timur',
            'Provinsi', ':', 'Sulawesi Selatan',
            'Sebab Kematian', ':', 'Sakit',
            'Yang Menentukan', ':', '.................................................',
            'Keterangan Visum', ':', '.................................................',
        );

        $pdf->content6(
            '         Demikian Surat Keterangan Kematian ini kami buat untuk dipergunakan seperlunya.'
        );

        $pdf->content7(
            'Lampenai, 09 Januari 2021',
            'Kepala Desa Lampenai',
            'ZAENAL BACHRIE'
        );
    //}

    
    

    $pdf->output();


?>