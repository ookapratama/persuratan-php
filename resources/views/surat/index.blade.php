@extends('layout.v_template')
@section('title', 'Surat Keluar')
@section('titleNav','Kelola Surat > Surat Keluar')

@section('content')

    <?php 
        $jenisSuratGen = array(
            "Surat Keterangan Tidak Mampu" => "sktm",
            "Surat Keterangan Domisili" => "domisili",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "kehilangan",
        );

        $jenisSuratShow = array(
            "Surat Keterangan Tidak Mampu" => "show_sktm",
            "Surat Keterangan Domisili" => "domisili",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "show_hilang",
        );

        $jenisSuratEdit = array(
            "Surat Keterangan Tidak Mampu" => "edit_sktm",
            "Surat Keterangan Domisili" => "domisili",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "edit_hilang",
        );

        $jenisSuratHapus = array(
            "Surat Keterangan Tidak Mampu" => "destroy_sktm",
            "Surat Keterangan Domisili" => "domisili",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "delete_hilang",
        );

        $jenisSuratArsip = array(
            "Surat Keterangan Tidak Mampu" => "destroy_sktm",
            "Surat Keterangan Domisili" => "domisili",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "delete_hilang",
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
                <th>Stts Arsip</th>
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
                    <td>{{ $data->status_arsip=="Y"?"Arsip" : "Belum" }}</td>
                    <td>
                        <a onclick="show('{{ route($jenisSuratShow[$data->jenis_surat], $data->id) }}')" class="btn btn-sm btn-info fa fa-eye" title="detail"></a>
                        <a onclick="edit('{{ route($jenisSuratEdit[$data->jenis_surat], $data->id) }}')" class="btn btn-sm btn-warning fa fa-pencil" title="edit"></a>
                        <a onclick="hapus('{{ route($jenisSuratHapus[$data->jenis_surat], $data->id) }}')" class="btn btn-sm btn-danger fa fa-trash" title="delete"></a>
                        <a href="generateSurat/{{ $jenisSuratGen[$data->jenis_surat] ?? '' }}/index.php?data={{ base64_encode($data->id) }}" target="_blank" class="btn btn-sm btn-success fa fa-file-pdf-o" title="generate pdf"></a>
                        <a onclick="arsip(`{{ route('suratKeluar_arsip', $data->id) }}`)" class="btn btn-sm btn-primary fa fa-archive" title="arsip surat"></a>
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

            $(document).on('click', '#btnCreateSktm', function() {
                $.validator.addMethod('valueNotEquals', function(value, element, arg) {
                    return arg !== value;
                });

                $('#formCreateSktm').validate({
                    rules: {
                        no_surat: {
                            required: true
                        },
                        user_approve: {
                            valueNotEquals: "default"
                        },
                        tgl_surat: {
                            required: true
                        },
                        nama_pemohon: {
                            required: true
                        },
                        tempat_lahir: {
                            required: true
                        },
                        tgl_lahir: {
                            required: true
                        },
                        nik: {
                            required: true
                        },
                        pekerjaan: {
                            required: true
                        },
                        alamat: {
                            required: true
                        },
                        is_antar: {
                            valueNotEquals: "default"
                        },
                    },
                    messages: {
                        no_surat : "No surat harus diisi",
                        user_approve: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        tgl_surat : "Tgl surat harus diisi",
                        nama_pemohon : "Nama pemohon harus diisi",
                        tempat_lahir : "Tempat lahir harus diisi",
                        tgl_lahir : "Tgl lahir harus diisi",
                        nik : "NIK harus diisi",
                        pekerjaan : "Pekerjaan harus diisi",
                        alamat : "Alamat harus diisi",
                        is_antar: {
                            valueNotEquals: "Pilih salah satu"
                        }
                    }
                });
            });
            
            $(document).on('click', '#btnCreateHilang', function() {
                $.validator.addMethod('valueNotEquals', function(value, element, arg) {
                    return arg !== value;
                });

                $('#formCreateHilang').validate({
                    rules: {
                        user_approve: {
                            valueNotEquals: "default"
                        },
                        no_surat: {
                            required: true
                        },
                        perihal: {
                            required: true
                        },
                        lampiran: {
                            required: true
                        },
                        tgl_surat: {
                            required: true
                        },
                        nama_pemohon: {
                            required: true
                        },
                        jenis_kelamin: {
                            valueNotEquals: "default"
                        },
                        tempat_lahir: {
                            required: true
                        },
                        tgl_lahir: {
                            required: true
                        },
                        nik: {
                            required: true,
                            minlength: 16,
                            maxlength: 16
                        },
                        status_kawin: {
                            valueNotEquals: "default"
                        },
                        agama: {
                            valueNotEquals: "default"
                        },
                        pekerjaan: {
                            required: true
                        },
                        alamat: {
                            required: true
                        },
                        benda_hilang: {
                            required: true
                        },
                        is_antar: {
                            valueNotEquals: "default"
                        },
                    },
                    messages: {
                        user_approve: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        no_surat : "No surat harus diisi",
                        perihal : "Perihal harus diisi",
                        lampiran : "Lampiran harus diisi",
                        tgl_surat : "Tgl surat harus diisi",
                        nama_pemohon : "Nama pemohon harus diisi",
                        jenis_kelamin: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        tempat_lahir : "Tempat lahir harus diisi",
                        tgl_lahir : "Tgl lahir harus diisi",
                        nik : {
                            required: "NIK harus diisi",
                            minlength: "Jumlah karakter kurang",
                            maxlength: "Jumlah karakter lebih"
                        },
                        status_kawin: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        agama: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        pekerjaan : "Pekerjaan harus diisi",
                        alamat : "Alamat harus diisi",
                        benda_hilang : "Benda hilang harus diisi",
                        is_antar: {
                            valueNotEquals: "Pilih salah satu"
                        }
                    }
                });
            });
        });

        function show(route) {
            console.log(route);
            $.get(route, function(data){
                $("#modalTitle").html('DETAIL SURAT');
                $("#page").html(data);
                $('#myModal').modal('show');
            });
        }

        function edit(route) {
            console.log(route);
            $.get(route, function(data){
                $("#modalTitle").html('EDIT SURAT');
                $("#page").html(data);
                $('#myModal').modal('show');
            });
        }

        function hapus(route) {
            $("#titleDelete").html('HAPUS SURAT');
            $("#bodyDelete").html("Apakah anda yakin ingin menghapus surat ini ?");
            $("#actionDelete").attr("href",route);
            $("#modalDelete").modal('show'); 
        }

        function arsip(route) {
            $("#titleAccept").html('ARSIP SURAT');
            $("#bodyAccept").html("Pastikan data surat sudah benar !");
            $("#actionAccept").attr("href",route);
            $("#modalAccept").modal('show');
        }

    </script>

    @if (Session::has('pesan'))
        <script>
            // toastr.warning("{!! Session::get('pesan') !!}");
            toastr.{{ Session::get('alert') }}("{{ Session::get('pesan') }}");
        </script>
    @endif

@endsection
