@extends('layout.v_template')
@section('title', 'Surat Keluar')
@section('titleNav','Kelola Surat > Surat Keluar')

@section('content')

    {{-- <a href="{{ route('create_sktm') }}">Surat Keterangan Tidak Mampu</a><br>
    <a href="">Surat Keterangan Kelahiran</a> --}}

    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#pilihSurat"><i class="fa fa-plus"></i> Tambah Data</button>
    
    <br>
    <br>

    @if(session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success</h4>
        {{ session('pesan') }}
    </div>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Surat</th>
                <th>Nama Pemohon</th>
                <th>No Surat</th>
                <th>TGL Surat</th>
                <th>Status Generate</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            @foreach ($surat as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->jenis_surat }}</td>
                    <td>{{ $data->nama_pemohon }}</td>
                    <td>{{ $data->no_surat }}</td>
                    <td>{{ $data->tgl_surat }}</td>
                    <td>{{ $data->is_generated=="Y"?"Yes" : "No" }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-primary fa fa-eye" title="detail"></a>
                        <a href="" class="btn btn-sm btn-warning fa fa-pencil" title="edit"></a>
                        <button type="button" class="btn btn-sm btn-danger fa fa-times" title="delete" data-toggle="modal" data-target="#delete{{ $data->id }}"></button>
                        <a class="btn btn-sm btn-success fa fa-file-pdf-o" title="generate pdf" data-toggle="modal" data-target="#setuju{{ $data->id }}"></a>
                    </td>             
                </tr> 

                <div class="modal fade bd-example-modal-lg" id="pilihSurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable  modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Pilih Jenis Surat</h4>
                            </div>

                            <div class="modal-body" style="overflow: hidden">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class='col-sm-3 text-right' style='height: 40px'>
                                            <span class="align-bottom" style="line-height: 40px; vertical-align: middle"><b>Field</b></span>
                                        </div>

                                        <div class="col-sm-7">
                                            <div class="dropdown bootstrap-select dropdown w-100">
                                                <select class="selectpicker" id="Field" name="Field" data-width="100%">
                                                    <option value="">Select a Field</option>
                                                    <option data-icon="fas fa-font" value='1'>1</option>
                                                    <option data-icon="fas fa-font" value='2'>2</option>
                                                    <option data-icon="fas fa-font" value='3'>3</option>
                                                    <option data-icon="fas fa-font" value='4'>4</option>
                                                    <option data-icon="fas fa-font" value='5'>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <select class="form-select" aria-label="Default select example" ms-boxsizing="">
                                    <option selected>Jenis Surat</option>
                                    <option value="1">SURAT KETERANGAN TIDAK MAMPU</option>
                                    <option value="2">SURAT KETERANGAN KEHILANGAN</option>
                                    <option value="3">SURAT KETERANGAN DOMISILI</option>
                                    <option value="3">SURAT KETERANGAN KEMATIAN</option>
                                  </select> --}}
                                
                                {{-- <div class="form-check">
                                    <input type="radio" name="textEditor" id="sktm" checked>
                                    <label for="sktm">SURAT KETERANGAN TIDAK MAMPU</label>
                                </div>

                                <div class="form-check">
                                    <input type="radio" name="textEditor" id="kehilangan">
                                    <label for="kehilangan">SURAT KETERANGAN KEHILANGAN</label>
                                </div>

                                <div class="form-check">
                                    <input type="radio" name="textEditor" id="domisili">
                                    <label for="domisili">SURAT KETERANGAN DOMISILI</label>
                                </div>

                                <div class="form-check">
                                    <input type="radio" name="textEditor" id="kematian">
                                    <label for="kematian">SURAT KETERANGAN KEMATIAN</label>
                                </div> --}}

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Batal</button>
                                <a href="" class="btn btn-success">Pilih</a>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                
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

@endsection
