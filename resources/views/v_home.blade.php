@extends('layout.v_template')
@section('title', 'Home')
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 align="center"><strong>SISTEM INFOMASI MANAJEMEN SURAT DESA LAMPENAI</strong></h2>
        </div>
        <div class="box-body">
            <h3 class="box-title"><b style="color: rgb(60, 141, 188)">Selamat Datang {{ Auth::user()->name }} !</b></h3>
            <br>
            <h4>Aplikasi Manajemen Persuratan Desa Lampenai, Kecamatan Wotu, Kabupaten Luwu Timur</h4>
        </div>
    </div>

    
    

@endsection
