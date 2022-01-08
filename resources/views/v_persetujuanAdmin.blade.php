@extends('layout.v_template')
@section('title', 'Surat Setuju')
@section('titleNav', 'Surat Disetujui')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Surat</th>
                <th>Nama Pemohon</th>
                <th>No Surat</th>
                <th>TGL Surat</th>
                <th>Status Cetak</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            @foreach ($surat as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->jenis_surat }}</td>
                    <td>{{ $data->nama_pemohon }}</td>
                    <td>{{ $data->no_surat }}</td>
                    <td>{{ $data->tgl_surat }}</td>
                    <td>{{ $data->status_cetak=="Y"?"Sudah" : "Belum" }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning fa fa-eye"></a>
                        <a href="" class="btn btn-sm btn-success fa fa-print"></a>
                    </td>             
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection