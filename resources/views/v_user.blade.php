@extends('layout.v_template')
@section('title', 'User')
@section('titleNav', 'Kelola User')

@section('content')

    <div class="row">
        <div class="col-lg-8">
            {{-- <a 
                class="btn btn-sm btn-primary" 
                data-backdrop="static" 
                data-keyboard="false" 
                data-toggle="modal" 
                data-target="#FormAddUser">
                <i class="fa fa-plus"></i> Tambah User
            </a> --}}

            <button
                class="btn btn-sm btn-primary" onclick="create()"><i class="fa fa-plus"></i> Tambah User</button>
        </div>
    </div>

    <div id="read" class="mt-3"></div>

    {{-- <table class="table table-striped table-bordered ">
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
            @foreach ($kelolauser as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->jabatan }}</td>
                    <td>{{ $data->level->level_name }}</td>
                    <td>

                        <a class="btn btn-sm btn-warning fa fa-pencil" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#FormEditUser{{ $data->id }}"></a>
                        <button
                            id="editButton"
                            class="btn btn-sm btn-warning fa fa-pencil"
                            data-id="{{ $data->id }}"
                            data-backdrop="static" 
                            data-keyboard="false" 
                            data-toggle="modal" 
                            data-target="#modalEdit"
                            title="edit">
                        </button>

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
                    </div>
                </div>
                
            @endforeach
        </tbody>
    </table> --}}

    {{-- MODAL --}}

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalTitle"><strong></strong></h4>
                </div>
    
                <div class="modal-body">
                    <div id="page" class="p-2"></div>
                </div>

                <div class="modal-footer">
                    <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</a>   
                    {{-- <button type="submit" id="submit" class="btn btn-success btn-sm pull-left"></button> --}}
                </div>

            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalTitle"><strong></strong></h4>
                </div>
    
                <form id="formEdit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" name="idUser" id="idUser" class="form-control">
                        
                        <div class="form-group has-feedback">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>   
                        </div>
                        
                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>                   
                        </div>
                        
                        <div class="form-group has-feedback">
                            <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" required>                   
                        </div>
                        
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>               
                        </div>
                        
                        <div class="form-group has-feedback">
                            <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm Password" required>                    
                        </div>
                        
                        <div class="form-group has-feedback">
                            <select name="level_id" class="form-control" id="level" >
                                <option>Pilih Level</option>
                                <option value="4">Admin</option>
                                <option value="2">Pimpinan</option>
                                <option value="1">Kurir</option>
                            </select>              
                        </div>  
                    </div>
    
                    <div class="modal-footer">
                        <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</a>   
                        <button type="submit" id="submit" class="btn btn-success btn-sm pull-left"></button>
                    </div>
                </form>

            </div>
        </div>
    </div> --}}

    {{-- END MODAL --}}

    {{-- @include('v_adduser') --}}
    
@endsection

@section('script')
<!-- section script --> 
    <script >
        $(document).ready(function() {
            read()
        });

        //read database
        function read() {
            $.get("{{ url('/user/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }

        // modal add
        function create() {
            $.get("{{ url('/user/add') }}", {}, function(data, status) {
                $("#modalTitle").html('ADD USER');
                $("#page").html(data);
                $("#myModal").modal('show');
            });
        }

        // proses create data
        function insert() {
            var name = $("#name").val();
            var email = $("#email").val();
            var jabatan = $("#jabatan").val();
            var password = $("#password").val();
            var level = $("#level").val();

            $.ajax({
                type: "get",
                url: "{{ url('/user/insert') }}",
                data: {
                    // "name="+ name,
                    // "email="+ email,
                    // "jabatan="+ jabatan,
                    // "password="+ napasswordme,
                    // "level_id="+ level_id,
                    name: name,
                    email: email,
                    jabatan: jabatan,
                    password: password,
                    level_id: level,
                },
                success:function(data){
                    // $(".close").click();
                    // read()
                    $('#page').trigger("reset");
                    $('#myModal').modal('hide');
                    // window.location.reload(true);
                    read()
                }
            });
        }

        // $('body').on('click', '#editButton', function (event) {
        //     event.preventDefault();
        //     var id = $(this).data('id');
        //     $.get('user/edit/'+id, function (data) { 
        //         $('h4#modalTitle').html("EDIT USER");
        //         $('#submit').text("Update");
        //         $('#modalEdit').modal('show');
        //         $('#name').val(data.dataUser.name);
        //         $('#idUser').val(data.dataUser.id);
        //         $('#email').val(data.dataUser.email);
        //         $('#jabatan').val(data.dataUser.jabatan);
        //         $('select#level').val(data.dataUser.level_id);
        //     })
        // });

        // $("#AddUser").validate({
        //     rules: {
        //         name: {
        //             required:true,
        //         },
        //         email: {
        //             required:true,
        //             email: true
        //         },
        //         password: {
        //             required:true,
        //             minlength:8
        //         },
        //         password_confirmation: {
        //             required:true,
        //             minlength:8,
        //             equalTo:"#password1"
        //         },
        //         level_id:"required",
        //         jabatan:"required"
                
        //     },
        //     messages: {
        //         name: {
        //             required: "nama harus diisi"
        //         },
        //         email: {
        //             required: "email harus diisi",
        //         },
        //         password: {
        //             required: "password harus diisi",
        //             minlength: "password harus lebih dari 8 karakter",
        //         },
        //         password_confirmation: {
        //             required: "password harus diisi",
        //             minlength: "password harus lebih dari 8 karakter",
        //             equalTo: "password tidak sama"
        //         },
        //         level_id: {
        //             required: "level harus diisi"
        //         },
        //         jabatan: {
        //             required: "jabatan harus diisi"
        //         }
        //     }
        // });

        // $("#EditUser").validate({
        //     rules: {
        //         name: {
        //             required:true,
        //         },
        //         email: {
        //             required:true,
        //             email: true
        //         },
        //         password: {
        //             required:true,
        //             minlength:8
        //         },
        //         password_confirmation: {
        //             required:true,
        //             minlength:8,
        //             equalTo:"#password2"
        //         },
        //         level_id:"required",
        //         jabatan:"required"
                
        //     },
        //     messages: {
        //         name: {
        //             required: "nama harus diisi"
        //         },
        //         email: {
        //             required: "email harus diisi",
        //         },
        //         password: {
        //             required: "password harus diisi",
        //             minlength: "password harus lebih dari 8 karakter",
        //         },
        //         password_confirmation: {
        //             required: "password harus diisi",
        //             minlength: "password harus lebih dari 8 karakter",
        //             equalTo: "password tidak sama"
        //         },
        //         level_id: {
        //             required: "level harus diisi"
        //         },
        //         jabatan: {
        //             required: "jabatan harus diisi"
        //         }
        //     }
        // });

    </script>
@endsection







        
