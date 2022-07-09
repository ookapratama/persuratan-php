@extends('layout.v_template')
@section('title', 'Surat Keluar')

@section('content')

    <?php 

        $jenisSuratShow = array(
            "Surat Keterangan Tidak Mampu" => "show_sktm",
            "Surat Keterangan Kematian" => "show_mati",
            "Surat Keterangan Kehilangan" => "show_hilang",
            "Surat Keterangan Kelahiran" => "show_lahir",
            "Surat Keterangan Domisili" => "show_domisili",
            "Surat Keterangan Usaha" => "show_usaha",
        );

        $jenisSuratEdit = array(
            "Surat Keterangan Tidak Mampu" => "edit_sktm",
            "Surat Keterangan Kematian" => "edit_mati",
            "Surat Keterangan Kehilangan" => "edit_hilang",
            "Surat Keterangan Kelahiran" => "edit_lahir",
            "Surat Keterangan Domisili" => "edit_domisili",
            "Surat Keterangan Usaha" => "edit_usaha",
        );

        $jenisSuratHapus = array(
            "Surat Keterangan Tidak Mampu" => "destroy_sktm",
            "Surat Keterangan Kematian" => "delete_mati",
            "Surat Keterangan Kehilangan" => "delete_hilang",
            "Surat Keterangan Kelahiran" => "delete_lahir",
            "Surat Keterangan Domisili" => "delete_domisili",
            "Surat Keterangan Usaha" => "delete_usaha",
        );

        $jenisSuratGen = array(
            "Surat Keterangan Tidak Mampu" => "sktm",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "kehilangan",
            "Surat Keterangan Kelahiran" => "kelahiran",
            "Surat Keterangan Domisili" => "domisili",
            "Surat Keterangan Usaha" => "usaha",
        );
    ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="text-center"><strong>SURAT KELUAR</strong></h3>
            <div class="col">
                <div class="col">
                    <select class="form-control" id="selectSurat" style="width: 300px; float: left; margin-right: 20px;">
                        <option value="">Pilih Jenis Surat</option>
                        <option data-route="{{ route('create_sktm') }}">SURAT KETERANGAN TIDAK MAMPU</option>
                        <option data-route="{{ route('create_hilang') }}">SURAT KETERANGAN KEHILANGAN</option>
                        <option data-route="{{ route('create_lahir') }}">SURAT KETERANGAN KELAHIRAN</option>
                        <option data-route="{{ route('create_domisili') }}">SURAT KETERANGAN DOMISILI</option>
                        <option data-route="{{ route('create_mati') }}">SURAT KETERANGAN KEMATIAN</option>
                        <option data-route="{{ route('create_usaha') }}">SURAT KETERANGAN USAHA</option>
                    </select>
                </div>
                <div class="col">
                    <button class="btn btn-sm btn-primary" id="btnTambahSurat"><i class="fa fa-plus-square"></i> Tambah Data</button><br>
                </div>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Surat</th>
                        <th>Nama</th>
                        <th>No Surat</th>
                        <th>TGL Surat</th>
                        <th>Status Arsip</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($surat as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->jenis_surat }}</td>
                            <td>{{ $data->nama_pemohon ?? $data->nama_bayi}}</td>
                            <td>{{ $data->no_surat }}</td>
                            <td>{{ $data->tgl_surat }}</td>
                            <td><span class="label label-danger">{{ $data->status_arsip=="Y"?"Arsip" : "Belum" }}</span></td>
                            <td>
                                <a onclick="show('{{ route($jenisSuratShow[$data->jenis_surat], $data->id) }}')" class="btn btn-sm btn-info fa fa-eye" title="detail"></a>
                                <a onclick="edit('{{ route($jenisSuratEdit[$data->jenis_surat], $data->id) }}')" class="btn btn-sm btn-warning fa fa-pencil" title="edit"></a>
                                <a onclick="hapus('{{ route($jenisSuratHapus[$data->jenis_surat], $data->id) }}')" class="btn btn-sm btn-danger fa fa-trash" title="delete"></a>
                                <a href="generateSurat/{{ $jenisSuratGen[$data->jenis_surat] ?? '' }}/index.php?data={{ base64_encode($data->id) }}" target="_blank" class="btn btn-sm btn-success fa fa-file-pdf-o" title="generate pdf"></a>
                                <a onclick="arsip(`{{ route('suratKeluar_arsip', $data->id) }}`)" class="btn btn-sm btn-primary fa fa-archive" title="arsip surat"></a>
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
                            required: true,
                            minlength: 16,
                            maxlength: 16
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
                        nik : {
                            required: "NIK harus diisi",
                            minlength: "Jumlah karakter kurang",
                            maxlength: "Jumlah karakter lebih"
                        },
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

            $(document).on('click', '#btnCreateLahir', function() {
                $.validator.addMethod('valueNotEquals', function(value, element, arg) {
                    return arg !== value;
                });

                $('#formCreateLahir').validate({
                    rules: {
                        user_approve: {
                            valueNotEquals: "default"
                        },
                        no_surat: {
                            required: true
                        },
                        hari_lahir: {
                            valueNotEquals: "default"
                        },
                        tgl_lahir: {
                            required: true
                        },
                        pukul_lahir: {
                            required: true,
                            maxlength: 15
                        },
                        jenis_kelamin: {
                            valueNotEquals: "default"
                        },
                        tempat_lahir: {
                            valueNotEquals: "default"
                        },
                        nama_bayi: {
                            required: true
                        },
                        nama_ibu: {
                            required: true
                        },
                        nik_ibu: {
                            required: true,
                            minlength: 16,
                            maxlength: 16
                        },
                        nama_ayah: {
                            required: true
                        },
                        nik_ayah: {
                            required: true,
                            minlength: 16,
                            maxlength: 16
                        },
                        alamat: {
                            required: true
                        },
                        kecamatan: {
                            required: true
                        },
                        kabupaten: {
                            required: true
                        },
                        tgl_surat: {
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
                        hari_lahir: {
                            valueNotEquals: "Pilih hari lahir"
                        },
                        tgl_lahir : "Tgl lahir harus diisi",
                        pukul_lahir : {
                            required: "Pukul lahir harus diisi",
                            maxlength: "Jumlah karakter lebih"
                        },
                        jenis_kelamin: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        tempat_lahir: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        nama_bayi : "Nama bayi harus diisi",
                        nama_ibu : "Nama ibu harus diisi",
                        nik_ibu : {
                            required: "NIK harus diisi",
                            minlength: "Jumlah karakter kurang",
                            maxlength: "Jumlah karakter lebih"
                        },
                        nama_ayah : "Nama ayah harus diisi",
                        nik_ayah : {
                            required: "NIK harus diisi",
                            minlength: "Jumlah karakter kurang",
                            maxlength: "Jumlah karakter lebih"
                        },
                        alamat : "Alamat harus diisi",
                        kecamatan : "Kecamatan harus diisi",
                        kabupaten : "Kabupaten harus diisi",
                        tgl_surat : "Tgl surat harus diisi",
                        is_antar: {
                            valueNotEquals: "Pilih salah satu"
                        }
                    }
                });
            });

            $(document).on('click', '#btnCreateDomisili', function() {
                $.validator.addMethod('valueNotEquals', function(value, element, arg) {
                    return arg !== value;
                });

                $('#formCreateDomisili').validate({
                    rules: {
                        user_approve: {
                            valueNotEquals: "default"
                        },
                        no_surat: {
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
                        agama: {
                            valueNotEquals: "default"
                        },
                        pekerjaan: {
                            required: true
                        },
                        alamat: {
                            required: true
                        },
                        alamat_domisili: {
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
                        agama: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        pekerjaan : "Pekerjaan harus diisi",
                        alamat : "Alamat harus diisi",
                        alamat_domisili : "Alamat harus diisi",
                        is_antar: {
                            valueNotEquals: "Pilih salah satu"
                        }
                    }
                });
            });

            $(document).on('click', '#btnCreateMati', function() {
                $.validator.addMethod('valueNotEquals', function(value, element, arg) {
                    return arg !== value;
                });

                $('#formCreateMati').validate({
                    rules: {
                        user_approve: {
                            valueNotEquals: "default"
                        },
                        no_surat: {
                            required: true
                        },
                        nama_pemohon: {
                            required: true
                        },
                        nik: {
                            required: true,
                            minlength: 16,
                            maxlength: 16
                        },
                        no_kk: {
                            required: true,
                            minlength: 16,
                            maxlength: 16
                        },
                        tempat_lahir: {
                            required: true
                        },
                        tgl_lahir: {
                            required: true
                        },
                        jenis_kelamin: {
                            valueNotEquals: "default"
                        },
                        warga_negara: {
                            required: true
                        },
                        agama: {
                            valueNotEquals: "default"
                        },
                        status_kawin: {
                            valueNotEquals: "default"
                        },
                        pekerjaan: {
                            required: true
                        },
                        alamat: {
                            required: true
                        },
                        hari_mati: {
                            valueNotEquals: "default"
                        },
                        tgl_mati: {
                            required: true
                        },
                        tempat_mati: {
                            required: true
                        },
                        kecamatan: {
                            required: true
                        },
                        kabupaten: {
                            required: true
                        },
                        provinsi: {
                            required: true
                        },
                        sebab_mati: {
                            required: true
                        },
                        tgl_surat: {
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
                        nama_pemohon : "Nama harus diisi",
                        nik : {
                            required: "NIK harus diisi",
                            minlength: "Jumlah karakter kurang",
                            maxlength: "Jumlah karakter lebih"
                        },
                        no_kk : {
                            required: "No. KK harus diisi",
                            minlength: "Jumlah karakter kurang",
                            maxlength: "Jumlah karakter lebih"
                        },
                        tempat_lahir : "Tempat lahir harus diisi",
                        tgl_lahir : "Tgl lahir harus diisi",
                        jenis_kelamin: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        warga_negara : "Warga Negara harus diisi",
                        agama: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        status_kawin: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        pekerjaan : "Pekerjaan harus diisi",
                        alamat : "Alamat harus diisi",
                        hari_mati: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        tgl_mati : "Tgl mati harus diisi",
                        tempat_mati : "Tempat mati harus diisi",
                        kecamatan : "Kecamatan mati harus diisi",
                        kabupaten : "Kabupaten mati harus diisi",
                        provinsi : "Provinsi mati harus diisi",
                        sebab_mati : "Sebab mati harus diisi",
                        tgl_surat : "Tgl surat harus diisi",
                        is_antar: {
                            valueNotEquals: "Pilih salah satu"
                        }
                    }
                });
            });

            $(document).on('click', '#btnCreateUsaha', function() {
                $.validator.addMethod('valueNotEquals', function(value, element, arg) {
                    return arg !== value;
                });

                $('#formCreateUsaha').validate({
                    rules: {
                        user_approve: {
                            valueNotEquals: "default"
                        },
                        no_surat: {
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
                        jenis_kelamin: {
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
                        nik: {
                            required: true,
                            minlength: 16,
                            maxlength: 16
                        },
                        jenis_usaha: {
                            required: true
                        },
                        alamat_usaha: {
                            required: true
                        },
                        tahun_usaha: {
                            valueNotEquals: "default"
                        },
                        tgl_surat: {
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
                        nama_pemohon : "Nama harus diisi",
                        tempat_lahir : "Tempat lahir harus diisi",
                        tgl_lahir : "Tgl lahir harus diisi",
                        jenis_kelamin: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        agama: {
                            valueNotEquals: "Pilih salah satu"
                        },
                        pekerjaan : "Pekerjaan harus diisi",
                        alamat : "Alamat harus diisi",
                        nik : {
                            required: "NIK harus diisi",
                            minlength: "Jumlah karakter kurang",
                            maxlength: "Jumlah karakter lebih"
                        },
                        jenis_usaha : "Jenis usaha harus diisi",
                        alamat_usaha : "Alamat usaha harus diisi",
                        tahun_usaha : {
                            valueNotEquals: "Pilih salah satu"
                        },
                        tgl_surat : "Tgl surat harus diisi",
                        is_antar: {
                            valueNotEquals: "Pilih salah satu"
                        }
                    }
                });
            });
        });

        function show(route) {
            $.get(route, function(data){
                $("#modalTitle").html('DETAIL SURAT');
                $("#page").html(data);
                $('#myModal').modal('show');
            });
        }

        function edit(route) {
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
