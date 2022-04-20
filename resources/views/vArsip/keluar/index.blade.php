@extends('layout.v_template')
@section('title', 'Arsip Keluar')
@section('titleNav','Arsip > Surat Keluar')

@section('content')

    <?php
        $jenisSuratUpload = array(
            "Surat Keterangan Tidak Mampu" => "show_sktm",
            "Surat Keterangan Domisili" => "domisili",
            "Surat Keterangan Kematian" => "kematian",
            "Surat Keterangan Kehilangan" => "show_hilang",
        );
    ?>

    <div class="box box-primary">
        <div class="box-header with-border">
            
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
                        <th>File Surat</th>
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
                            <td>{{ $data->status_arsip=='Y' ? 'Arsip' : 'Belum' }}</td>
                            <td>
                                @if($data->file_surat)
                                    <a href="#" class="btn btn-sm btn-info">Surat</a>
                                @else
                                    <a class="btn btn-sm btn-default" disabled>Surat</a>
                                @endif
                            </td>
                            <td> 
                                <a class="btn btn-sm btn-success fa fa-upload" onclick="" title="detail"></a>
                                <a class="btn btn-sm btn-warning fa fa-eye" title="edit file" onclick=""></a>
                                <a href="#" class="btn btn-sm btn-primary fa fa-print" title="cetak"></a>
                                <button type="button" class="btn btn-sm btn-danger fa fa-trash" title="delete" data-toggle="modal" data-target="#delete{{ $data->id }}"></button>
                            </td>             
                        </tr> 
                        
                        <div class="modal fade" id="setuju{{ $data->id }}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title">Generate Surat</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin generate surat permohonan?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Batal</button>
                                        <a href="{{ route("surat_generate", $data->id) }}" class="btn btn-success">Ya</a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
            
                        <div class="modal modal-danger fade" id="delete{{ $data->id }}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title">Tolak Permohonan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menolak surat permohonan ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                                        <a href="{{ route('surat_delete', $data->id) }}" class="btn btn-outline">Ya</a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>   

@endsection

@section('script')

    <script>
        
        function edit(id) {
            // $.get("{{ url('/disposisi/edit') }}/"+id, {}, function(data) {
                $("#modalTitle").html('EDIT ARSIP SURAT');
                // $("#page").html(data);
                $("#myModal").modal('show');
            // });
        }
        
    </script>

@endsection



