@extends('layout.v_template')
@section('title', 'Arsip Masuk')
@section('titleNav','Arsip > Surat Masuk')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            
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
                            <td>{{ $data->status_arsip=="Y"?"Arsip" : "Belum" }}</td>
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
                                <a class="btn btn-sm btn-warning fa fa-eye" onclick="show({{ $data->id }})" title="detail"></a>
                                <a href="#" class="btn btn-sm btn-success fa fa-print" title="cetak"></a>
                                <a href="#" class="btn btn-sm btn-danger fa fa-trash" title="Hapus"></a>
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

        function upload(id) {
            console.log(id);
            $.get("{{ url('/arsip/viewUpload') }}/"+id, {}, function(data) {
                $('#typeModal').attr("class", "modal-dialog")
                $("#modalTitle").html('UPLOAD FILE DISPOSISI');
                $("#page").html(data);
                $("#myModal").modal('show');
            });
        }

    </script>

    @if (Session::has('pesan'))
    <script>
        toastr.{{ Session::get('alert') }}("{{ Session::get('pesan') }}");
    </script>
    @endif

@endsection