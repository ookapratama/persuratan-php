@extends('layout.v_template')
@section('title', 'Disposisi')
@section('titleNav','Kelola Surat > Disposisi')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            @if(auth()->user()->level_id == 3 or auth()->user()->level_id == 4)
                <a class="btn btn-sm btn-primary" id="tambahDisposisi"><i class="fa fa-plus-square"></i> Tambah Data</a><br>
                {{-- <br> --}}
            @endif
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Perihal</th>
                        <th>TGL. Surat</th>
                        <th>No. Surat</th>
                        <th>Asal Surat</th>
                        <th>TGL. Terima</th>
                        <th>File Surat</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($disposisi as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->perihal }}</td>
                            <td>{{ $data->tgl_surat }}</td>
                            <td>{{ $data->no_surat }}</td>
                            <td>{{ $data->asal_surat }}</td>
                            <td>{{ $data->tgl_terima }}</td>
                            <td><a href="{{ asset('storage/file-suratMasuk/'.$data->file_surat) }}" class="btn btn-sm btn-info" target="_blank">File</a></td>
                            <td>
                                <a class="btn btn-sm btn-primary fa fa-eye" onclick="show({{ $data->id }})" title="detail"></a>
                                <a class="btn btn-sm btn-warning fa fa-pencil" onclick="edit({{ $data->id }})" title="edit"></a>
                                <button class="btn btn-sm btn-danger fa fa-trash" onclick="hapus(`{{ route('delete_disposisi', $data->id) }}`)" title="delete"></button>
                                <a class="btn btn-sm btn-success fa fa-check-square" onclick="process(`{{ route('accept_disposisi', $data->id) }}`)" title="disposisi"></a>
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
        $(document).ready(function(){

            //modal add
            $('#tambahDisposisi').on('click', function() {
                $.get("{{ route('add_disposisi') }}", function(data){
                    $("#modalTitle").html('TAMBAH SURAT');
                    $("#page").html(data);
                    $('#myModal').modal('show');
                });
            });

            $(document).on('click', '#btnCreateDisposisi', function() {
                // event.preventDefault();
                $.validator.addMethod('valueNotEquals', function(value, element, arg) {
                    return arg !== value;
                });
                $.validator.addMethod('filesize', function (value, element, param) {
                    return this.optional(element) || (element.files[0].size <= param)
                }, 'Maksimal ukuran file {0}MB');

                $('#formCreateDisposisi').validate({
                    rules: {
                        perihal: {
                            required: true
                        },
                        asal_surat: {
                            required: true
                        },
                        no_surat: {
                            required: true
                        },
                        kode_surat: {
                            required: true
                        },
                        tgl_surat: {
                            required: true
                        },
                        tgl_terima: {
                            required: true
                        },
                        tgl_selesai: {
                            required: true
                        },
                        tgl_disposisi: {
                            required: true
                        },
                        isi_ringkas: {
                            required: true
                        },
                        isi_disposisi: {
                            required: true
                        },
                        user_approve: {
                            valueNotEquals: "default"
                        },
                        file_surat: {
                            required: true,
                            extension: "pdf",
                            filesize: 2000000
                        }      
                    },
                    messages: {
                        perihal : "Perihal harus diisi",
                        asal_surat : "Asal surat harus diisi",
                        no_surat : "No surat harus diisi",
                        kode_surat : "Kode surat harus diisi",
                        tgl_surat : "Tanggal surat harus diisi",
                        tgl_terima : "Tanggal terima harus diisi",
                        tgl_selesai : "Tanggal selesai harus diisi",
                        tgl_disposisi : "Tanggal disposisi harus diisi",
                        isi_ringkas : "Isi ringkas harus diisi",
                        isi_disposisi : "Isi disposisi harus diisi",
                        user_approve : {
                            valueNotEquals: "Pilih salah satu",
                        }, 
                        file_surat : {
                            required: "Mohon upload file surat",
                            extension: "Tipe surat harus ber-Ekstensi .pdf",
                            filesize: "Maksimal ukuran file 2MB",
                        }
                    }   
                });
            });
        });

        function show(id) {
            $.get("{{ url('/disposisi/show') }}/"+id, {}, function(data) {
                $("#modalTitle").html('DETAIL SURAT');
                $("#page").html(data);
                $("#myModal").modal('show');
            });
        }

        function edit(id) {
            $.get("{{ url('/disposisi/edit') }}/"+id, {}, function(data) {
                $("#modalTitle").html('EDIT SURAT');
                $("#page").html(data);
                $("#myModal").modal('show');
            });
        }

        function hapus(route) {
            $("#titleDelete").html('HAPUS DATA');
            $("#bodyDelete").html("Apakah anda yakin ingin menghapus data surat ini ?");
            $("#actionDelete").attr("href",route);
            $("#modalDelete").modal('show'); 
        }

        function process(route) {
            $("#titleAccept").html('PROSES DATA');
            $("#bodyAccept").html("Pastikan data surat sudah benar dan akan diproses ke halaman Persetujuan !");
            $("#actionAccept").attr("href",route);
            $("#modalAccept").modal('show');
        }

    </script>

    @if (Session::has('pesan'))
    <script>
        toastr.{{ Session::get('alert') }}("{{ Session::get('pesan') }}");
    </script>
    @endif

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error("{{ $error }}", {timeOut:7000});
            </script>
        @endforeach
    @endif
    
@endsection