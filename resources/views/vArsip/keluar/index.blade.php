@extends('layout.v_template')
@section('title', 'Arsip Keluar')
@section('titleNav','Arsip > Surat Keluar')

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

        $jenisSuratHapus = array(
            "Surat Keterangan Tidak Mampu" => "destroy_sktm",
            "Surat Keterangan Domisili" => "domisili",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "delete_hilang",
        );
    ?>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 align="center"><strong>ARSIP SURAT KELUAR</strong></h3>
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
                        <th>Stts Arsip</th>
                        <th>Action</th>
                    </tr>
                </thead>
            
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($arsip as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->jenis_surat }}</td>
                            <td>{{ $data->nama_pemohon }}</td>
                            <td>{{ $data->no_surat }}</td>
                            <td>{{ $data->tgl_surat }}</td>
                            <td><span class="label label-success">{{ $data->status_arsip=='Y' ? 'Arsip' : 'Belum' }}</span></td>
                            <td>
                                <a onclick="show('{{ route($jenisSuratShow[$data->jenis_surat], $data->id) }}')" class="btn btn-sm btn-warning fa fa-eye" title="detail"></a>
                                <a href="generateSurat/{{ $jenisSuratGen[$data->jenis_surat] ?? '' }}/index.php?data={{ base64_encode($data->id) }}" target="_blank" class="btn btn-sm btn-primary fa fa-print" title="cetak"></a>
                                <a onclick="hapus('{{ route($jenisSuratHapus[$data->jenis_surat], $data->id) }}')" class="btn btn-sm btn-danger fa fa-trash" title="delete"></a>
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
        
    </script>

    @if (Session::has('pesan'))
    <script>
        // toastr.warning("{!! Session::get('pesan') !!}");
        toastr.{{ Session::get('alert') }}("{{ Session::get('pesan') }}");
    </script>
@endif

@endsection



