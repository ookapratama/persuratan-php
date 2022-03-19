@extends('layout.v_template')
@section('title', 'Pengantaran')
@section('titleNav','Pengantaran Surat')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Surat</th>
                        <th>Nama Pemohon</th>
                        <th>No Surat</th>
                        <th>TGL Surat</th>
                        <th>Stts Antar</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($antar as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->jenis_surat }}</td>
                            <td>{{ $data->nama_pemohon }}</td>
                            <td>{{ $data->no_surat }}</td>
                            <td>{{ $data->tgl_surat }}</td>
                            <td><span class="label label-danger">{{ $data->status_antar=="Y"?"ter-Antar" : "Belum" }}</span></td>
                            <td>
                                <a data-route="{{ route('show_hilang', $data->id) }}" id="btnShow" class="btn btn-sm btn-info fa fa-eye" title="detail"></a>
                                <a href="{{ route('confirm_antar',$data->id) }}" class="btn btn-sm btn-success fa fa-check-square-o" title="konfirmasi"></a>
                            </td>             
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(function() {

            $('#btnTambahSurat').on('click', function() {

                let select = $('#selectSurat');

                if(!select.val()) return
                let route = select.find(":selected").data('route');
                let title = select.find(":selected").text();
                $.get(route, function(data){
                    $("#modalTitle").html('TAMBAH '+ title);
                    $("#page").html(data);
                    $('#myModal').modal('show');
                });
            });

            $('#btnShow').on('click', function(id) {
                let route = data('route');

                $.get(route+id, function(data){
                    $("#modalTitle").html('Detail '+ title);
                    $("#page").html(data);
                    $('#myModal').modal('show');
                });
            })

            // $('#formInput').validate({
            //     rules: {
            //         name: {
            //             required:true,
            //         },
            //         email: {
            //             required:true,
            //             email: true
            //         },
            //         jabatan: {
            //             required:true,
            //         },
            //         password: {
            //             required:true,
            //             minlength:8
            //         },
            //         password_confirmation: {
            //             required:true,
            //             equalTo:"#password"
            //         },
            //         level_id: {
            //             valueNotEquals: "default",
            //         },                        
            //     },

            //     messages: {
            //         name : "Nama harus diisi.",
            //         email : {
            //             required: "Alamat email harus diisi.",
            //             email : "Masukkan format email yang valid",
            //         },
            //         jabatan : "Jabatan harus diisi.",
            //         password : {
            //             required: "Password harus diisi.",
            //             minlength : "Panjang password min 8",
            //         },
            //         password_confirmation : {
            //             required: "Password Confirmation harus diisi.",
            //             equalTo : "Password tidak sama",
            //         },
            //         level_id: {
            //             valueNotEquals: "Pilih salah satu",
            //         }
            //     },

            // });

            // function show(id) {
            //     $.get("{{ url('/surat/sktm/show') }}/"+id, {}, function(data) {
            //         $("#modalTitle").html('EDIT SURAT');
            //         $("#page").html(data);
            //         $("#myModal").modal('show');
            //     });
            // }

            

            
        });

        function show(id) {
            $.get("{{ url('/surat/sktm/show') }}/"+id, {}, function(data) {
                $("#modalTitle").html('DETAIL SURAT');
                $("#page").html(data);
                $("#myModal").modal('show');
            });
        }

    </script>

    @if (Session::has('pesan'))
        <script>
            // toastr.warning("{!! Session::get('pesan') !!}");
            toastr.{{ Session::get('alert') }}("{{ Session::get('pesan') }}");
        </script>
    @endif

@endsection
