@extends('layout.v_template')
@section('title', 'Surat Keluar')
@section('titleNav','Kelola Surat > Surat Keluar')

@section('content')

    <a href="{{ route('create_sktm') }}">Surat Keterangan Tidak Mampu</a><br>
    <a href="">Surat Keterangan Kelahiran</a>

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
                <th>Jenis Surat</th>
                <th>Nama Pemohon</th>
                <th>No Surat</th>
                <th>TGL Surat</th>
                <th>Status Generate</th>
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
                    <td>{{ $data->is_generated=="Y"?"Yes" : "No" }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning fa fa-eye"></a>
                        <button type="button" class="btn btn-sm btn-danger fa fa-times" data-toggle="modal" data-target="#delete{{ $data->id }}"></button>
                        <a class="btn btn-sm btn-success fa fa-check" data-toggle="modal" data-target="#setuju{{ $data->id }}"></a>
                    </td>             
                </tr> 
                
                <div class="modal fade" id="setuju{{ $data->id }}">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Generate Surat</h4>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin generate surat permohonan?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Batal</button>
                                <a href="{{ route("surat_generate", $data->id) }}" class="btn btn-success">Ya</a>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <div class="modal modal-danger fade" id="delete{{ $data->id }}">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Tolak Permohonan</h4>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin menolak surat permohonan ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                                <a href="{{ route('surat_delete', $data->id) }}" class="btn btn-outline">Ya</a>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            @endforeach
        </tbody>
    </table>

@endsection