@extends('layout.v_template')
@section('title', 'Create Surat Ket Tidak Mampu')
@section('titleNav', 'Kelola Surat > Surat Keluar > Add SKTM')

@section('content')

    <a href="/surat" class="btn btn-sm btn-primary">Kembali</a>

    <form action="{{ route('store_sktm') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">No Surat</label>
                        <input type="text" name="no_surat" class="form-control" value="{{ old('no_surat') }}" style="margin-bottom: 10px" autofocus required>
                        <div class="text-danger">
                            @error('no_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                     <div class="col-md-4">
                        <label class="form-label">Yang Menyetujui</label>                      
                        <select name="user_approve" class="form-control" style="margin-bottom: 10px">
                            @foreach ($user_approve as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Tanggal Surat</label>
                        <input type="date" name="tgl_surat" class="form-control" value="{{ old('tgl_surat') }}" style="margin-bottom: 10px" required>                       
                        <div class="text-danger">
                            @error('tgl_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Nama Pemohon</label>
                        <input type="text" name="nama_pemohon" class="form-control" value="{{ old('nama_pemohon') }}" style="margin-bottom: 10px" required>                        
                        <div class="text-danger">
                            @error('nama_pemohon')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" style="margin-bottom: 10px" required>                       
                        <div class="text-danger">
                            @error('tempat_lahir')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir') }}" style="margin-bottom: 10px" required>                      
                        <div class="text-danger">
                            @error('tgl_lahir')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">NIK</label>
                        <input type="number" name="nik" class="form-control" value="{{ old('nik') }}" style="margin-bottom: 10px" required>                       
                        <div class="text-danger">
                            @error('nik')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}" style="margin-bottom: 10px" required>                        
                        <div class="text-danger">
                            @error('pekerjaan')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" style="margin-bottom: 10px" required>
                        <div class="text-danger">
                            @error('alamat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4>&emsp;</h4>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success" style="width: 100px">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
