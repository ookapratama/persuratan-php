@extends('layout.v_template')
@section('title', 'Surat Setuju')
@section('titleNav','Surat Disetujui')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 align="center"><strong>SURAT DISETUJUI</strong></h3>
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
                        <th>File Surat</th>
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
                            <td><span class="label label-danger">{{ $data->status_arsip=="Y"?"ter-Arsip" : "Belum" }}</span></td>
                            <td><a href="{{ asset('storage/file-suratMasuk/'.$data->file_surat) }}" class="btn btn-sm btn-info" target="_blank">File</a></td>
                            <td>
                                <a class="btn btn-sm btn-warning fa fa-eye" onclick="show({{ $data->id }})" title="detail"></a>
                                <a href="{{ route('cetak_disposisi', base64_encode($data->id))}}" target="_blank" class="btn btn-sm btn-primary fa fa-print" title="cetak"></a>
                                <a onclick="arsip(`{{ route('surat_arsip',$data->id) }}`)" class="btn btn-sm btn-success fa fa-archive" title="Arsip"></a>
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
        });

        function show(id) {
            $.get("{{ url('/disposisi/show') }}/"+id, {}, function(data) {
                $("#modalTitle").html('DETAIL SURAT');
                $("#page").html(data);
                $("#myModal").modal('show');
            });
        }

        function arsip(route) {
            $("#titleAccept").html('ARSIP SURAT');
            $("#bodyAccept").html("Data surat akan dimasukkan ke Arsip !");
            $("#actionAccept").attr("href",route);
            $("#modalAccept").modal('show');
        }

    </script>

    @if (Session::has('pesan'))
    <script>
        toastr.{{ Session::get('alert') }}("{{ Session::get('pesan') }}");
    </script>
    @endif

@endsection