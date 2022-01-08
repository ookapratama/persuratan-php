@extends('layout.v_template')
@section('title', 'Create Surat Ket Tidak Mampu')
@section('titleNav', 'Kelola Surat > Surat Keluar > Add SKTM')

@section('content')

    <a href="/surat" class="btn btn-sm btn-warning">Kembali</a>

    <form action="{{ route('store_sktm') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-4">

                    <div class="form-group has-feedback">
                        <label for="">No Surat</label>
                        <input type="text" name="no_surat" class="form-control" placeholder=""  autofocus required>
                        {{-- <span class="glyphicon glyphicon-user form-control-feedback"></span> --}}
                        <div class="text-danger">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="">Yang Menyetujui</label>
                        {{-- <input name="user_approve" class="form-control" placeholder="" required> --}}
                        <select name="user_approve" class="form-control">
                            @foreach ($user_approve as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        {{-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> --}}
                    </div>

                    <div class="form-group has-feedback">
                        <label for="">Tanggal Surat</label>
                        <input type="date" name="tgl_surat" class="form-control" required>
                        {{-- <span class="glyphicon glyphicon-user form-control-feedback"></span> --}}
                        <div class="text-danger">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="">Nama Pemohon</label>
                        <input type="text" name="nama_pemohon" class="form-control" required>
                        {{-- <span class="glyphicon glyphicon-user form-control-feedback"></span> --}}
                        <div class="text-danger">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required>
                        {{-- <span class="glyphicon glyphicon-user form-control-feedback"></span> --}}
                        <div class="text-danger">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                        {{-- <span class="glyphicon glyphicon-user form-control-feedback"></span> --}}
                        <div class="text-danger">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="">NIK</label>
                        <input type="text" name="nik" class="form-control" required>
                        {{-- <span class="glyphicon glyphicon-user form-control-feedback"></span> --}}
                        <div class="text-danger">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" required>
                        {{-- <span class="glyphicon glyphicon-user form-control-feedback"></span> --}}
                        <div class="text-danger">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                        <div class="text-danger">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
