@extends('layout.v_template')
@section('title', 'Add Surat Masuk')

@section('content')
    <a href="/smasuk" class="btn btn-sm btn-warning">Kembali</a>

    <form action="/smasuk/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label>Tanggal Terima</label>
                        <input name="tgl_terima" class="form-control" value="{{ old('tgl_terima') }}" autofocus required>
                        <div class="text-danger">
                            @error('tgl_terima')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Asal Surat</label>
                        <input name="asal_surat" class="form-control" value="{{ old('asal_surat') }}" required>
                        <div class="text-danger">
                            @error('asal_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nomor Surat</label>
                        <input name="no_surat" class="form-control" value="{{ old('no_surat') }}" required>
                        <div class="text-danger">
                            @error('no_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input name="tgl_surat" class="form-control" value="{{ old('tgl_surat') }}" required>
                        <div class="text-danger">
                            @error('tgl_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Perihal</label>
                        <input name="perihal" class="form-control" value="{{ old('perihal') }}" required>
                        <div class="text-danger">
                            @error('perihal')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kode Surat</label>
                        <input name="kode_surat" class="form-control" value="{{ old('kode_surat') }}" required>
                        <div class="text-danger">
                            @error('kode_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>File Surat</label>
                        <input type="file" name="file_surat" class="form-control" value="{{ old('file_surat') }}" required>
                        <div class="text-danger">
                            @error('file_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
