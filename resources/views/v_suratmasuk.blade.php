@extends('layout.v_template')
@section('title', 'Arsip')
@section('titleNav', 'Arsip > Surat Masuk')

@section('content')
    @if(auth()->user()->level_id == 3 or auth()->user()->level_id == 4)
        <a href="/smasuk/add" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a><br>
        <br>
    @endif
    @if(session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success</h4>
            {{ session('pesan') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>TGL. Terima</th>
                <th>Asal Surat</th>
                <th>Nomor Surat</th>
                <th>TGL. Surat</th>
                <th>Perihal</th>
                <th>Kode Surat</th>
                <th>File Surat</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            @foreach($suratmasuk as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->tgl_terima }}</td>
                    <td>{{ $data->asal_surat }}</td>
                    <td>{{ $data->no_surat }}</td>
                    <td>{{ $data->tgl_surat }}</td>
                    <td>{{ $data->perihal }}</td>
                    <td>{{ $data->kode_surat }}</td>
                    <td>{{ $data->file_surat }}</td>
                    @if(auth()->user()->level_id == 3 or auth()->user()->level_id == 4)
                        <td>
                            <a href="/smasuk/detail/{{ $data->id_suratmasuk }}" class="btn btn-sm btn-success">Detail</a>
                            <a href="/smasuk/edit/{{ $data->id_suratmasuk }}" class="btn btn-sm btn-warning">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_suratmasuk }}">
                                Delete
                            </button>
                        </td>
                    @elseif(auth()->user()->level_id == 2)
                        <td>
                            <a href="/smasuk/detail/{{ $data->id_suratmasuk }}" class="btn btn-sm btn-success">Detail</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach($suratmasuk as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id_suratmasuk }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ $data->perihal }}</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                        <a href="/smasuk/delete/{{ $data->id_suratmasuk }}" class="btn btn-outline">Ya</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach

@endsection
