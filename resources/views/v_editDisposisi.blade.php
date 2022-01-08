@extends('layout.v_template')
@section('title', 'Edit Disposisi')
@section('titleNav', 'Kelola Surat > Disposisi > Edit Data')

@section('content')
    <a href="{{ route('disposisi') }}" class="btn btn-sm btn-warning">Kembali</a>
    <br>
    <br>

    <form action="{{ route('update_disposisi', $disposisi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-4">

                    <div class="form-group">
                        <label for="">Yang Menyetujui</label>
                        {{-- <input name="user_approve" class="form-control" placeholder="" required> --}}
                        <select name="user_approve" class="form-control">
                            @foreach ($user_approve as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        {{-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> --}}
                    </div>

                    <div class="form-group">
                        <label>Perihal</label>
                        <input type="text" name="perihal" class="form-control" value="{{ $disposisi->perihal }}" autofocus required>
                        <div class="text-danger">
                            @error('perihal')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="date" name="tgl_surat" class="form-control" value="{{ $disposisi->tgl_surat }}" required>
                        <div class="text-danger">
                            @error('tgl_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nomor Surat</label>
                        <input type="text" name="no_surat" class="form-control" value="{{ $disposisi->no_surat }}" required>
                        <div class="text-danger">
                            @error('no_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kode Surat</label>
                        <input type="text" name="kode_surat" class="form-control" value="{{ $disposisi->kode_surat }}" required>
                        <div class="text-danger">
                            @error('kode_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Asal Surat</label>
                        <input type="text" name="asal_surat" class="form-control" value="{{ $disposisi->asal_surat }}" required>
                        <div class="text-danger">
                            @error('asal_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Isi Ringkas</label>
                        <input type="text" name="isi_ringkas" class="form-control" value="{{ $disposisi->isi_ringkas }}" required>
                        <div class="text-danger">
                            @error('isi_ringkas')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Terima Surat</label>
                        <input type="date" name="tgl_terima" class="form-control" value="{{ $disposisi->tgl_terima }}" required>
                        <div class="text-danger">
                            @error('tgl_terima')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Penyelesaian</label>
                        <input type="date" name="tgl_selesai" class="form-control" value="{{ $disposisi->tgl_selesai }}" required>
                        <div class="text-danger">
                            @error('tgl_selesai')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Disposisi</label>
                        <input type="date" name="tgl_disposisi" class="form-control" value="{{ $disposisi->tgl_disposisi }}" required>
                        <div class="text-danger">
                            @error('tgl_disposisi')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Isi Disposisi</label>
                        <input type="text" name="isi_disposisi" class="form-control" value="{{ $disposisi->isi_disposisi }}" required>
                        <div class="text-danger">
                            @error('isi_disposisi')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Upload File Surat</label>
                        <input type="text" name="file_surat" class="form-control" value="{{ $disposisi->file_surat }}" required>
                        <div class="text-danger">
                            @error('file_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
