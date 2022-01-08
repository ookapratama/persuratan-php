@extends('layout.v_template')
@section('title', 'Detail Surat Masuk')

@section('content')
    <table class="table">
        <tr>
            <th width="100px">TGL. Terima</th>
            <th width="30px">:</th>
            <th>{{ $suratmasuk->tgl_terima }}</th>
        </tr>
        <tr>
            <th width="100px">Asal Surat</th>
            <th width="30px">:</th>
            <th>{{ $suratmasuk->asal_surat }}</th>
        </tr>
        <tr>
            <th width="100px">Nomor Surat</th>
            <th width="30px">:</th>
            <th>{{ $suratmasuk->no_surat }}</th>
        </tr>
        <tr>
            <th width="100px">TGL. Surat</th>
            <th width="30px">:</th>
            <th>{{ $suratmasuk->tgl_surat }}</th>
        </tr>
        <tr>
            <th width="100px">Perihal</th>
            <th width="30px">:</th>
            <th>{{ $suratmasuk->perihal }}</th>
        </tr>
        <tr>
            <th width="100px">Kode Surat</th>
            <th width="30px">:</th>
            <th>{{ $suratmasuk->kode_surat }}</th>
        </tr>
        <tr>
            <th width="100px">File Surat</th>
            <th width="30px">:</th>
            <th>{{ $suratmasuk->file_surat }}</th>
        </tr>
    </table>
    <a href="/smasuk" class="btn btn-sm btn-success">Kembali</a>

@endsection