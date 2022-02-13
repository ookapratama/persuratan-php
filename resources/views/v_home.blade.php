@extends('layout.v_template')
@section('title', 'Home')
@section('titleNav','Home')

@section('content')
    <h1>Selamat Datang {{ Auth::user()->name }} !</h1>
    <h3>Aplikasi Manajemen Persuratan Desa Lampenai, Kecamatan Wotu, Kabupaten Luwu Timur</h3>


    
@endsection
