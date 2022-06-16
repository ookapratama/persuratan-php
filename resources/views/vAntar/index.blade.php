@extends('layout.v_template')
@section('title', 'Pengantaran')
@section('titleNav','Pengantaran Surat')

@section('content')

    <?php 
        $jenisSuratShow = array(
            "Surat Keterangan Tidak Mampu" => "show_sktm",
            "Surat Keterangan Domisili" => "domisili",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "show_hilang",
            "Surat Keterangan Kelahiran" => "show_hilang",
        );
    ?>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 align="center"><strong>PENGANTARAN SURAT KELUAR</strong></h3>
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
                        <th>Status Antar</th>
                        <th>Action</th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($antar as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->jenis_surat }}</td>
                            <td>{{ $data->nama_pemohon ?? $data->nama_bayi }}</td>
                            <td>{{ $data->no_surat }}</td>
                            <td>{{ $data->tgl_surat }}</td>
                            <td><span class="label {{ $data->status_antar=="Y" ? "label-success" : "label-danger" }}">{{ $data->status_antar=="Y"?"ter-Antar" : "Belum" }}</span></td>
                            <td>
                                <a onclick="show('{{ route($jenisSuratShow[$data->jenis_surat], $data->id) }}')" class="btn btn-sm btn-info fa fa-eye" title="detail"></a>
                                <a onclick="confirm(`{{ route('confirm_antar', $data->id) }}`)" class="btn btn-sm btn-success fa fa-check-square-o" title="konfirmasi"></a>
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

        });

        function show(route) {
            $.get(route, function(data){
                $("#modalTitle").html('DETAIL SURAT');
                $("#page").html(data);
                $('#myModal').modal('show');
            });
        }

        function confirm(route){
            $("#titleAccept").html('KONFIRMASI SURAT');
            $("#bodyAccept").html("Apakah surat sudah sampai ke penerima?");
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
