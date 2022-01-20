@extends('layout.v_template')
@section('title', 'Disposisi')
@section('titleNav','Kelola Surat > Disposisi')

@section('content')
    @if(auth()->user()->level_id == 3 or auth()->user()->level_id == 4)
        {{-- <a href="/disposisi/add" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a><br> --}}
        <a class="btn btn-sm btn-primary" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#FormAddDisposisi"><i class="fa fa-plus"></i> Tambah Data</a><br>
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
                <th>Perihal</th>
                <th>TGL. Surat</th>
                <th>No. Surat</th>
                <th>Asal Surat</th>
                <th>TGL. Terima</th>
                <th>File Surat</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            @foreach($disposisi as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->perihal }}</td>
                    <td>{{ $data->tgl_surat }}</td>
                    <td>{{ $data->no_surat }}</td>
                    <td>{{ $data->asal_surat }}</td>
                    <td>{{ $data->tgl_terima }}</td>
                    <td><a href="{{ asset('storage/'.$data->file_surat) }}" class="btn btn-sm btn-info" target="_blank">File</a></td>
                    <td>
                        <a href="{{ route('show_disposisi', $data->id) }}" class="btn btn-sm btn-primary fa fa-eye" title="detail"></a>
                        <a href="{{ route('edit_disposisi', $data->id) }}" class="btn btn-sm btn-warning fa fa-pencil" title="edit"></a>
                        <button type="button" class="btn btn-sm btn-danger fa fa-trash"  title="delete" data-toggle="modal" data-target="#delete{{ $data->id }}"></button>
                        <a class="btn btn-sm btn-success fa fa-file-pdf-o" title="generate pdf" data-toggle="modal" data-target=""></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach($disposisi as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id }}">
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
                        <a href="/disposisi/delete/{{ $data->id }}" class="btn btn-outline">Ya</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach

    @include('v_addDisposisi')
    

@endsection

@section('script')
    
@endsection