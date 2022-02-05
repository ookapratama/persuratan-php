@extends('layout.v_template')
@section('title', 'Surat Keluar')
@section('titleNav','Kelola Surat > Surat Keluar')

@section('content')

    <?php 
        $arrJenis = array(
            "Surat Keterangan Tidak Mampu" => "sktm",
            "Surat Keterangan Domisili" => "domisili",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "kehilangan",
        );
    ?>
    <br>

    <div class="col">
        <div class="col">
            <select class="form-control" id="selectSurat" style="width: 300px; float: left; margin-right: 20px;">
                <option value="">Pilih Jenis Surat</option>
                <option data-route="{{ route('create_sktm') }}">SURAT KETERANGAN TIDAK MAMPU</option>
                <option data-route="{{ route('create_hilang') }}">SURAT KETERANGAN KEHILANGAN</option>
            </select>
        </div>
        <div class="col">
            <button class="btn btn-sm btn-primary" id="btnTambahSurat"><i class="fa fa-plus"></i> Tambah Data</button><br>
        </div>
    </div>

    <br>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Surat</th>
                <th>Nama Pemohon</th>
                <th>No Surat</th>
                <th>TGL Surat</th>
                <th>Stts Cetak</th>
                <th>Stts Arsip</th>
                <th colspan="2">Action</th>
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
                    <td>{{ $data->is_print=="Y"?"Dicetak" : "Belum" }}</td>
                    <td></td>
                    <td>
                        {{-- <a class="btn btn-sm btn-info fa fa-eye" onclick="show({{ $data->id }})" title="detail"></a> --}}
                        <a data-route="{{ route('show_hilang', $data->id) }}" id="btnShow" class="btn btn-sm btn-info fa fa-eye" title="detail"></a>
                        <a href="" class="btn btn-sm btn-warning fa fa-pencil" title="edit"></a>
                        <button type="button" class="btn btn-sm btn-danger fa fa-trash" title="delete" data-toggle="modal" data-target="#delete{{ $data->id }}"></button>
                        {{-- <form action="{{ route('surat_delete', $data->id) }}"></form> --}}
                        {{-- <button class="btn btn-sm btn-danger fa fa-trash" title="delete" onclick="return confirm('anda yakin?')"></button> --}}
                        <a href="generateSurat/{{ $arrJenis[$data->jenis_surat] ?? '' }}/index.php?data={{ base64_encode($data->id) }}" target="_blank" class="btn btn-sm btn-primary fa fa-file-pdf-o" title="generate pdf"></a>
                        {{-- <a class="btn btn-sm btn-success fa fa-file-archive-o" title="generate pdf" disabled></a> --}}
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
