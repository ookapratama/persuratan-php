@extends('layout.v_template')
@section('title', 'User')
@section('titleNav', 'Kelola User')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <a class="btn btn-sm btn-primary" id="tambahUser"><i class="fa fa-plus"></i> Tambah User</a>
    </div>
    <div class="box-body">
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
                            <button class="btn btn-sm btn-warning fa fa-pencil" onclick="edit({{ $data->id }})" title="edit"></button>
                            <button class="btn btn-sm btn-danger fa fa-trash" onclick="hapus(`{{ route('user_delete', $data->id) }}`)" title="delete"></button>
                        </td>                   
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>    
    
@endsection

@section('script')
<!-- section script --> 
    <script >
        $(document).ready(function() {
            
            //modal add show
            $('#tambahUser').on('click', function(){
                $.get("{{ route('user_add') }}", function(data){
                    $('#typeModal').attr("class", "modal-dialog")
                    $("#modalTitle").html('TAMBAH USER');
                    $("#page").html(data);
                    // $("#formInput").html(data);
                    $('#myModal').modal('show');
                });
            });

            $(document).on('click', '#btnCreate', function() {

                $.validator.addMethod('valueNotEquals', function(value, element, arg) {
                    return arg !== value;
                });

                $('#formCreate').validate({
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
                            minlength:6
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
                        name : "Kolom nama tidak boleh kosong",
                        email : {
                            required: "Kolom email tidak boleh kosong.",
                            email : "Masukkan format email yang valid",
                        },
                        jabatan : "Kolom jabatan tidak boleh kosong",
                        password : {
                            required: "Kolom password tidak boleh kosong",
                            minlength : "Panjang password minimal 6 karakter",
                        },
                        password_confirmation : {
                            required: "Password Confirmation harus diisi.",
                            equalTo : "Password tidak sama",
                        },
                        level_id: {
                            valueNotEquals: "Pilih salah satu",
                        }
                    }    
                });
            });

            $(document).on('click', '#btnUpdate', function() {

                $.validator.addMethod('valueNotEquals', function(value, element, arg) {
                    return arg !== value;
                });

                $('#formEdit').validate({
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
                            minlength:6
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
                        name : "Kolom nama tidak boleh kosong",
                        email : {
                            required: "Kolom email tidak boleh kosong.",
                            email : "Masukkan format email yang valid",
                        },
                        jabatan : "Kolom jabatan tidak boleh kosong",
                        password : {
                            required: "Kolom password tidak boleh kosong",
                            minlength : "Panjang password minimal 6 karakter",
                        },
                        password_confirmation : {
                            required: "Password Confirmation harus diisi.",
                            equalTo : "Password tidak sama",
                        },
                        level_id: {
                            valueNotEquals: "Pilih salah satu",
                        }
                    }    
                });
            });
        });

        function edit(id) {
            $.get("{{ url('/user/edit') }}/"+id, {}, function(data) {
                $('#typeModal').attr("class", "modal-dialog")
                $("#modalTitle").html('EDIT USER');
                $("#page").html(data);
                $("#myModal").modal('show');
            });
        }

        function hapus(route) {
            $("#titleDelete").html('HAPUS USER');
            $("#bodyDelete").html("Apakah anda yakin ingin menghapus user ini ?");
            // $("#btnCancel").attr("class", "btn btn-outline pull-left");
            // $("#actionDelete").attr("class", "btn btn-outline");
            $("#actionDelete").attr("href",route);
            $("#modalDelete").modal('show'); 
        }

    </script>

    @if (Session::has('pesan'))
    <script>
        toastr.{{ Session::get('alert') }}("{{ Session::get('pesan') }}");
    </script>
    @endif

@endsection







        
