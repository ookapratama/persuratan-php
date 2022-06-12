@extends('layout.v_template')
@section('title', 'Arsip Masuk')
@section('content')

    <br>
    <?php

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
        )
    ?>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="text-center"><strong>ARSIP SURAT MASUK</strong></h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <form action="{{ route('filter_masuk') }}">
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
                                <a href="{{ route('arsip_masuk') }}" class="btn btn-sm btn-primary">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="form-group col-md-6">
                    <form action="{{ route('search_masuk') }}">
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
                        <th>Perihal</th>
                        <th>TGL. Surat</th>
                        <th>No. Surat</th>
                        <th>Asal Surat</th>
                        <th>TGL. Terima</th>
                        <th>Stts Arsip</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($surat as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->perihal }}</td>
                            <td>{{ $data->tgl_surat }}</td>
                            <td>{{ $data->no_surat }}</td>
                            <td>{{ $data->asal_surat }}</td>
                            <td>{{ $data->tgl_terima }}</td>
                            <td><span class="label label-success">{{ $data->status_arsip=="Y"?"Arsip" : "Belum" }}</span></td>
                            <td>
                                @if($data->file_surat)
                                    <a href="{{ asset('storage/file-suratMasuk/'.$data->file_surat) }}" class="btn btn-sm btn-info" target="_blank">Surat</a>
                                @endif
                                @if ($data->file_disposisi)
                                    <a href="{{ asset('storage/file-suratDisposisi/'.$data->file_disposisi) }}" class="btn btn-sm btn-info" target="_blank">Disposisi</a>
                                @else
                                    <a class="btn btn-sm btn-default" disabled>Disposisi</a>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary fa fa-upload" onclick="upload({{ $data->id }})" title="detail"></a>
                                <a class="btn btn-sm btn-warning fa fa-eye" onclick="show(`{{ route('show_disposisi', $data->id) }}`)" title="detail"></a>
                                <a class="btn btn-sm btn-success fa fa-print" href="generateSurat/disposisi/index.php?data={{ base64_encode($data->id) }}" target="_blank" title="cetak"></a>
                                <a class="btn btn-sm btn-danger fa fa-trash" onclick="hapus(`{{ route('delete_disposisi', $data->id) }}`)" title="Hapus"></a>
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

            $(document).on('click', '#btnUploadMasuk', function() {

                $.validator.addMethod('filesize', function (value, element, param) {
                    return this.optional(element) || (element.files[0].size <= param)
                }, 'Maksimal ukuran file {0}MB');

                $('#formUploadMasuk').validate({
                    rules: {
                        file_disposisi: {
                            required: true,
                            extension: "pdf",
                            filesize: 2000000
                        }
                    },
                    messages: {
                        file_disposisi : {
                            required: "Mohon upload file surat",
                            extension: "Tipe surat harus ber-Ekstensi .pdf",
                            filesize: "Maksimal ukuran file 2MB",
                        }
                    }
                    
                });
            });

            // $('#btnFilter').on('click', function() {

            //     let selectBulan = $('#selectBulan');
            //     let selectTahun = $('#selectTahun');

            //     if(!selectBulan.val() && !selectTahun.val()) return
            // });

            // $('#btnSearch').on('click', function() {

            //     let select = $('#inputSearch');

            //     if(!select.val()) return
            // });

        });

        function show(route) {
            $.get(route, function(data){
                $("#modalTitle").html('DETAIL SURAT');
                $('#typeModal').attr("class", "modal-dialog modal-lg")
                $("#page").html(data);
                $('#myModal').modal('show');
            });
        }

        function upload(id) {
            console.log(id);
            $.get("{{ url('/arsip/viewUpload') }}/"+id, {}, function(data) {
                $('#typeModal').attr("class", "modal-dialog")
                $("#modalTitle").html('UPLOAD FILE DISPOSISI');
                $("#page").html(data);
                $("#myModal").modal('show');
            });
        }

        function hapus(route) {
            $("#titleDelete").html('HAPUS ARSIP SURAT');
            $("#bodyDelete").html("Apakah anda yakin ingin menghapus surat dari arsip ?");
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