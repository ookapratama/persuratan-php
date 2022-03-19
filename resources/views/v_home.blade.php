@extends('layout.v_template')
@section('title', 'Home')
@section('titleNav','Home')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Selamat Datang {{ Auth::user()->name }} !</b></h3>
        </div>
        <div class="box-body">
            <h4>Aplikasi Manajemen Persuratan Desa Lampenai, Kecamatan Wotu, Kabupaten Luwu Timur</h4>
        </div>
    </div>
    

@endsection
