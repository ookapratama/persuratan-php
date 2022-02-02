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

            <a class="btn btn-sm btn-primary" id="btnTambah"><i class="fa fa-plus"></i> Tambah User</a>
        </div>
    </div>

    <div id="read" class="mt-3"></div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
    
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalTitle"><strong>Tambah</strong></h4>
                </div>
    
                <div class="modal-body" id="modalBody">
                    
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</button>   
                </div>
    
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered ">
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
    
                        {{-- <a class="btn btn-sm btn-warning fa fa-pencil" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#FormEditUser{{ $data->id }}"></a> --}}
                        <button
                            class="btn btn-sm btn-warning fa fa-pencil"
                            onclick="edit({{ $data->id }})"
                            title="edit">
                        </button>
    
                        <button
                            class="btn btn-sm btn-danger fa fa-trash" 
                            onclick="destroy({{ $data->id }})"
                            title="delete">
                        </button>
                    </td>                   
                </tr>
    
                {{-- <div class="modal modal-danger fade" id="delete{{ $data->id }}">
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
                </div> --}}
                
            @endforeach
        </tbody>
    </table>

    

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

    

    {{-- @include('v_adduser') --}}
    
@endsection

@section('script')
<!-- section script --> 
    <script >
        $(document).ready(function() {
            read()

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
            
            //modal add show
            $('#btnTambah').on('click', function(){
                $.get("{{ route('user_add') }}", function(data){
                    $("#modalTitle").html('TAMBAH USER');
                    $("#formInput").html(data);
                    $('#myModal').modal('show');
                });
            });

            $.validator.addMethod('valueNotEquals', function(value, element, arg) {
                return arg !== value;
            });

            $('#formInput').validate({
                rules: {
                        name: {
                            required:true,
                        },
                        email: {
                            required:true,
                            email: true
                        },
                        jabatan: {
                            required:true,
                        },
                        password: {
                            required:true,
                            minlength:8
                        },
                        password_confirmation: {
                            required:true,
                            equalTo:"#password"
                        },
                        level_id: {
                            valueNotEquals: "default",
                        },                        
                    },
                    messages: {
                        name : "Nama harus diisi.",
                        email : {
                            required: "Alamat email harus diisi.",
                            email : "Masukkan format email yang valid",
                        },
                        jabatan : "Jabatan harus diisi.",
                        password : {
                            required: "Password harus diisi.",
                            minlength : "Panjang password min 8",
                        },
                        password_confirmation : {
                            required: "Password Confirmation harus diisi.",
                            equalTo : "Password tidak sama",
                        },
                        level_id: {
                            valueNotEquals: "Pilih salah satu",
                        }
                    },
                    submitHandler: function() {
                        var name = $("#name").val();
                        var email = $("#email").val();
                        var jabatan = $("#jabatan").val();
                        var password = $("#password").val();
                        var level_id = $("#level_id").val();

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('user_insert') }}",
                            data: {
                                name: name,
                                email: email,
                                jabatan: jabatan,
                                password: password,
                                level_id: level,
                            },
                            success: function(data) {
                                $('#formInput').trigger("reset");
                                $('#myModal').modal('hide');
                                read()
                            },
                        });
                    }
            });

            // $('#btnSimpan').on('click', function(e){
            //     var name = $("#name").val();
            //     var email = $("#email").val();
            //     var jabatan = $("#jabatan").val();
            //     var password = $("#password").val();
            //     var cPassword = $("#password_confirmation").val();
            //     var level_id = $("#level_id").val();

            //     $('#formInput').validate({
            //         rules: {
            //             name: {
            //                 required:true,
            //             },
            //             email: {
            //                 required:true,
            //                 email: true
            //             },
            //             jabatan: {
            //                 required:true,
            //             },
            //             password: {
            //                 required:true,
            //                 minlength:8
            //             },
            //             cPass: {
            //                 required:true,
            //                 equalTo:"#password"
            //             },
            //             level_id: {
            //                 required:true,
            //             },                        
            //         },

            //         messages: {
            //             name : "Nama harus diisi.",
            //             email : {
            //                 required: "Alamat email harus diisi.",
            //                 email : "Masukkan format email yang valid",
            //             },
            //             jabatan : "Jabatan harus diisi.",
            //             password : {
            //                 required: "Password harus diisi.",
            //                 minlength : "Panjang password min 8",
            //             },
            //             cPass : {
            //                 required: "Password Confirmation harus diisi.",
            //                 equalTo : "Password tidak sama",
            //             },
            //             level_id : "Level user harus dipilih.",
            //         },

            //         highlight: function(element) {
            //             $(element).addClass('error')
            //         },

            //         submitHandler: function() {
            //             var formData = new FormData(form[0]);
            //             $.ajax({
            //                 type: 'POST',
            //                 url: "{{ route('user_insert') }}",
            //                 data : formData,
            //                 dataType: 'JSON',
            //                 processData: false,
            //                 contentType: false,
            //                 success: function(data) {
            //                     if(data.exists) {
            //                         $('#notifDiv').fadeIn();
            //                         $('#notifDiv').css('background', 'red');
            //                         $('#notifDiv').text('Email sudah terdaftar');
            //                         setTimeout(() => {
            //                             $('#notifDiv').fadeOut();
            //                         }, 3000);
            //                     } else if(data.success) {
            //                         $('#notifDiv').fadeIn();
            //                         $('#notifDiv').css('background', 'green');
            //                         $('#notifDiv').text('User berhasil ditambah');
            //                         setTimeout(() => {
            //                             $('#notifDiv').fadeOut();
            //                         }, 3000);
            //                         $('[name="name"]').val('');
            //                         $('[name="email"]').val('');
            //                         $('[name="jabatan"]').val('');
            //                         $('[name="password"]').val('');
            //                         $('[name="cPass"]').val('');
            //                         $('[name="level_id"]').val('');
            //                     }else {
            //                         $('#notifDiv').fadeIn();
            //                         $('#notifDiv').css('background', 'red');
            //                         $('#notifDiv').text('Email sudah terdaftar');
            //                         setTimeout(() => {
            //                             $('#notifDiv').fadeOut();
            //                         }, 3000);
            //                     }
            //                 }
            //             });
            //         }
            //     });
            // });


        });

        //read database
        function read() {
            $.get("{{ url('/user/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }

        // // modal add
        // function create() {
        //     $.get("{{ url('/user/add') }}", {}, function(data, status) {
        //         $("#modalTitle").html('ADD USER');
        //         $("#page").html(data);
        //         $("#myModal").modal('show');
        //     });
        // }

        // // proses create data
        // function insert() {
        //     var name = $("#name").val();
        //     var email = $("#email").val();
        //     var jabatan = $("#jabatan").val();
        //     var password = $("#password").val();
        //     var level = $("#level").val();

        //     // var formData = $("#formInsert").serialize();

        //     $.ajax({
        //         method: "get",
        //         url: "{{ url('/user/insert') }}",
        //         data: {
        //             name: name,
        //             email: email,
        //             jabatan: jabatan,
        //             password: password,
        //             level_id: level,
        //         },
        //         success:function(data){
        //             $('#page').trigger("reset");
        //             $('#myModal').modal('hide');
        //             read()   
        //         }
        //     });
        // }

        // // modal edit
        // function edit(id) {
        //     $.get("{{ url('/user/edit') }}/"+id, {}, function(data, status) {
        //         $("#modalTitle").html('EDIT USER');
        //         $("#page").html(data);
        //         $("#myModal").modal('show');
        //     });
        // }

        // // proses update data
        // function update(id) {
        //     var name = $("#name").val();
        //     var email = $("#email").val();
        //     var jabatan = $("#jabatan").val();
        //     var password = $("#password").val();
        //     var level = $("#level").val();

        //     $.ajax({
        //         type: "post",
        //         url: "{{ url('/user/update') }}/"+ id,
        //         data: {
        //             name: name,
        //             email: email,
        //             jabatan: jabatan,
        //             password: password,
        //             level_id: level,
        //         },
        //         success:function(data){
        //             $('#page').trigger("reset");
        //             $('#myModal').modal('hide');
        //             read()
                    
        //         }
        //     });
        // }

        // // proses delete data
        // function destroy(id) {
        //     confirm("Apakh anda yakin untuk hapus data ?");
        //     $.ajax({
        //         type: "post",
        //         url: "{{ url('/user/delete') }}/"+ id,
        //         data: {
        //             name: name,
        //             email: email,
        //             jabatan: jabatan,
        //             password: password,
        //             level_id: level,
        //         },
        //         success:function(data){
        //             $('#page').trigger("reset");
        //             $('#myModal').modal('hide');
        //             read()
                    
        //         }
        //     });
        // }

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







        
