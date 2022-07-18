@extends('layout.v_template')
@section('title', 'Arsip Keluar')

@section('content')

    <?php
        $jenisSuratGen = array(
            "Surat Keterangan Tidak Mampu" => "sktm",
            "Surat Keterangan Domisili" => "domisili",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "kehilangan",
            "Surat Keterangan Kelahiran" => "kelahiran",

        );

        $jenisSuratShow = array(
            "Surat Keterangan Tidak Mampu" => "show_sktm",
            "Surat Keterangan Domisili" => "show_domisili",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "show_hilang",
            "Surat Keterangan Kelahiran" => "show_lahir",
        );

        $jenisSuratHapus = array(
            "Surat Keterangan Tidak Mampu" => "destroy_sktm",
            "Surat Keterangan Domisili" => "delete_domisili",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "delete_hilang",
            "Surat Keterangan Kelahiran" => "delete_lahir",

        );

        $year = date('Y');

        $arrBulan = array(
            "Januari" => 1,
            "Februari" => 2,
            "Maret" => 3,
            "April" => 4,
            "Mei" => 5, 
            "Juni" => 6,
            "Juli" => 7,
            "Agustus" => 8,
            "September" => 9,
            "Oktober" => 10,
            "November" => 11,
            "Desember" => 12,
        );
    ?>
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="text-center"><strong>ARSIP SURAT KELUAR</strong></h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <form action="{{ route('filter_keluar') }}">
                        @csrf
                        <div class="col">
                            <div class="col">
                                <select class="form-control" id="selectBulan" name="bulan" style="width: 130px; float: left; margin-right: 20px;">
                                    <option value="">Bulan</option>
                                    @foreach($arrBulan as $month => $value)
                                        <option value="{{ $value }}" {{ isset($bulan) && $bulan == $value ? "selected" : "" }}>{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <select class="form-control" id="selectTahun" name="tahun" style="width: 130px; float: left; margin-right: 20px;">
                                    <option value="">Tahun</option>
                                    @for($i = $year - 5; $i <= $year; $i++)
                                        <option value="{{ $i }}" {{ isset($tahun) && $tahun == $i ? "selected" : "" }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-sm btn-primary" id="btnFilter">Filter Data</button>
                                <a href="{{ route('arsip_keluar') }}" class="btn btn-sm btn-primary">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="form-group col-md-6">
                    <form action="{{ route('search_keluar') }}">
                        @csrf
                        <div class="col">
                            <div class="col">
                                <button type="submit" id="btnSearch" class="btn btn-sm btn-primary" style="width: 50px; float: right; margin-right: 20px;">Cari</button>
                            </div>
                            <div class="col">
                                <input type="text" id="inputSearch" name="search" class="form-control" value="{{ $text ?? "" }}" style="width: 200px; float: right; margin-right: 20px;">
                            </div>
                        </div>
                    </form>
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
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
            
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($surat as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->jenis_surat }}</td>
                            <td>{{ $data->nama_pemohon ?? $data->nama_bayi }}</td>
                            <td>{{ $data->no_surat }}</td>
                            <td>{{ $data->tgl_surat }}</td>
                            <td><span class="label label-success">{{ $data->status_arsip=='Y' ? 'Arsip' : 'Belum' }}</span></td>
                            <td>
                                @if ($data->file_surat)
                                    <a href="{{ asset('storage/file-suratKeluar/'.$data->file_surat) }}" class="btn btn-sm btn-info" target="_blank">Surat</a>
                                @else
                                    <a class="btn btn-sm btn-default" disabled>Surat</a>
                                @endif
                            </td>
                            <td>
                                @if(Auth::user()->level_id == 3)
                                    <a class="btn btn-sm btn-primary fa fa-upload" onclick="upload({{ $data->id }})" title="upload"></a>
                                @endif
                                <a onclick="show('{{ route($jenisSuratShow[$data->jenis_surat], $data->id) }}')" class="btn btn-sm btn-warning fa fa-eye" title="detail"></a>
                                <a href="generateSurat/{{ $jenisSuratGen[$data->jenis_surat] ?? '' }}/index.php?data={{ base64_encode($data->id) }}" target="_blank" class="btn btn-sm btn-primary fa fa-print" title="cetak"></a>
                                @if(Auth::user()->level_id == 3)
                                    <a onclick="hapus('{{ route($jenisSuratHapus[$data->jenis_surat], $data->id) }}')" class="btn btn-sm btn-danger fa fa-trash" title="delete"></a>
                                @endif
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

            $(document).on('click', '#btnUploadKeluar', function() {

                $.validator.addMethod('filesize', function (value, element, param) {
                    return this.optional(element) || (element.files[0].size <= param)
                }, 'Maksimal ukuran file {0}MB');

                $('#formUploadKeluar').validate({
                    rules: {
                        file_surat: {
                            required: true,
                            extension: "pdf",
                            filesize: 2000000
                        }
                    },
                    messages: {
                        file_surat : {
                            required: "Mohon upload file surat",
                            extension: "Tipe surat harus ber-Ekstensi .pdf",
                            filesize: "Maksimal ukuran file 2MB",
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

        function hapus(route) {
            $("#titleDelete").html('HAPUS ARSIP SURAT');
            $("#bodyDelete").html("Apakah anda yakin ingin menghapus surat dari arsip ?");
            $("#actionDelete").attr("href",route);
            $("#modalDelete").modal('show'); 
        }

        function upload(id) {
            console.log(id);
            $.get("{{ url('/arsipKeluar/viewUpload') }}/"+id, {}, function(data) {
                $('#typeModal').attr("class", "modal-dialog")
                $("#modalTitle").html('UPLOAD FILE SURAT KELUAR');
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



