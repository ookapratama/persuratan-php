@extends('layout.v_template')
@section('title', 'User')
@section('titleNav', 'Kelola User')

@section('content')
    <a href="/user/add" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah User</a><br>
    <br>
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
                <th>Nama</th>
                <th>Email</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            @foreach ($kelolauser as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->level_id }}</td>
                    <td>
                        <a href="/user/edit/{{ $data->id }}" class="btn btn-sm btn-warning fa fa-pencil"></a>
                        <button type="button" class="btn btn-sm btn-danger fa fa-trash" data-toggle="modal" data-target="#delete{{ $data->id }}"></button>
                    </td>                   
                </tr>

                <div class="modal modal-danger fade" id="delete{{ $data->id }}">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">{{ $data->name }}</h4>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin menghapus user ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                                <a href="{{ route('user_delete', $data->id) }}" class="btn btn-outline">Ya</a>
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

        
