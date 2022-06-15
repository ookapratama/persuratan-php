@extends('layout.v_template')
@section('title', 'Persetujuan')
@section('titleNav','Persetujuan')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 align="center"><strong>PERSETUJUAN SURAT MASUK</strong></h3>
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
                        <th>Status Setuju</th>
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
                            <td><span class="label label-danger">{{ $data->status_setuju=="Y"?"Disetujui" : "Belum" }}</span></td>
                            <td><a href="{{ asset('storage/file-suratMasuk/'.$data->file_surat) }}" class="btn btn-sm btn-info" target="_blank">File</a></td>
                            <td>
                                <a class="btn btn-sm btn-primary fa fa-eye" onclick="show({{ $data->id }})" title="detail"></a>
                                <button class="btn btn-sm btn-danger fa fa-times" onclick="hapus(`{{ route('surat_delete', $data->id) }}`)" title="tolak"></button>
                                {{-- <a href="{{ route('surat_setuju', $data->id) }}" class="btn btn-sm btn-success fa fa-check-square-o" title="setuju"></a> --}}
                                <a class="btn btn-sm btn-success fa fa-check-square-o" onclick="setuju(`{{ route('surat_setuju', $data->id) }}`)" title="setuju"></a>
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

        function setuju(route) {
            $("#titleAccept").html('PERSETUJUAN SURAT');
            $("#bodyAccept").html("Apakah surat disetujui?");
            $("#actionAccept").attr("href",route);
            $("#modalAccept").modal('show');
        }

        function hapus(route) {
            $("#titleDelete").html('TOLAK DATA SURAT');
            $("#bodyDelete").html("Apakah anda yakin ingin menolak data surat ini ?");
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