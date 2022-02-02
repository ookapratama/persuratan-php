@extends('layout.v_template')
@section('title', 'Disposisi')
@section('titleNav','Kelola Surat > Disposisi')

@section('content')
    @if(auth()->user()->level_id == 3 or auth()->user()->level_id == 4)
        {{-- <a href="/disposisi/add" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a><br> --}}
        <a class="btn btn-sm btn-primary" id="tambahDisposisi"><i class="fa fa-plus-square"></i> Tambah Data</a><br>
        <br>
    @endif
    
    <table class="table table-bordered">
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
                    <td><a href="{{ asset('storage/'.$data->file_surat) }}" class="btn btn-sm btn-info" target="_blank">File</a></td>
                    <td>
                        <a class="btn btn-sm btn-primary fa fa-eye" onclick="show({{ $data->id }})" title="detail"></a>
                        <a class="btn btn-sm btn-warning fa fa-pencil" onclick="edit({{ $data->id }})" title="edit"></a>
                        <button type="button" class="btn btn-sm btn-danger fa fa-trash" title="delete" data-toggle="modal" data-target="#delete{{ $data->id }}"></button>
                        <a class="btn btn-sm btn-success fa fa-hourglass-start" title="disposisi" data-toggle="modal" data-target=""></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach($disposisi as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Hapus Data Surat</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus surat ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                        <a href="/disposisi/delete/{{ $data->id }}" class="btn btn-outline">Ya</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach    


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

        function edit(id) {
            $.get("{{ url('/disposisi/edit') }}/"+id, {}, function(data) {
                $("#modalTitle").html('EDIT SURAT');
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