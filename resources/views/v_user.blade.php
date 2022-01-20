@extends('layout.v_template')
@section('title', 'User')
@section('titleNav', 'Kelola User')

@section('content')

    <a class="btn btn-sm btn-primary" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#FormAddUser"><i class="fa fa-plus"></i> Tambah User</a><br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jabatan</th>
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
                    <td>{{ $data->jabatan }}</td>
                    <td>{{ $data->level->level_name }}</td>
                    <td>

                        <a class="btn btn-sm btn-warning fa fa-pencil" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#FormEditUser{{ $data->id }}"></a>

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

                {{-- @include('v_edituser') --}}
                
            @endforeach
        </tbody>
    </table>

    @include('v_edituser')

    @include('v_adduser')
    
@endsection

@section('script')
<!-- section script --> 
    <script >
        $(document).ready(function() {
            $("#AddUser").validate({
                rules: {
                    name: {
                        required:true,
                    },
                    email: {
                        required:true,
                        email: true
                    },
                    password: {
                        required:true,
                        minlength:8
                    },
                    password_confirmation: {
                        required:true,
                        minlength:8,
                        equalTo:"#password1"
                    },
                    level_id:"required",
                    jabatan:"required"
                    
                }
                // messages: {
                //     name: {
                //         required: "nama harus diisi"
                //     },
                //     email: {
                //         required: "email harus diisi",
                //     },
                //     password: {
                //         required: "password harus diisi",
                //         minlength: "password harus lebih dari 8 karakter",
                //     },
                //     password_confirmation: {
                //         required: "password harus diisi",
                //         minlength: "password harus lebih dari 8 karakter",
                //         equalTo: "password tidak sama"
                //     },
                //     level_id: {
                //         required: "level harus diisi"
                //     },
                //     jabatan: {
                //         required: "jabatan harus diisi"
                //     }
                // }
            });

            $("#EditUser").validate({
                rules: {
                    name: {
                        required:true,
                    },
                    email: {
                        required:true,
                        email: true
                    },
                    password: {
                        required:true,
                        minlength:8
                    },
                    password_confirmation: {
                        required:true,
                        minlength:8,
                        equalTo:"#password2"
                    },
                    level_id:"required",
                    jabatan:"required"
                    
                },
                messages: {
                    name: {
                        required: "nama harus diisi"
                    },
                    email: {
                        required: "email harus diisi",
                    },
                    password: {
                        required: "password harus diisi",
                        minlength: "password harus lebih dari 8 karakter",
                    },
                    password_confirmation: {
                        required: "password harus diisi",
                        minlength: "password harus lebih dari 8 karakter",
                        equalTo: "password tidak sama"
                    },
                    level_id: {
                        required: "level harus diisi"
                    },
                    jabatan: {
                        required: "jabatan harus diisi"
                    }
                }
            });
        });

    </script>
@endsection







        
