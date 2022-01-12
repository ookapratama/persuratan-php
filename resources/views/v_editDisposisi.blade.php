@extends('layout.v_template')
@section('title', 'Edit Disposisi')
@section('titleNav', 'Kelola Surat > Disposisi > Edit Data')

@section('content')
    <a href="{{ route('disposisi') }}" class="btn btn-sm btn-primary">Kembali</a>
    <br>


    <form action="{{ route('update_disposisi', $disposisi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">Perihal</label>
                        <input type="text" name="perihal" class="form-control" value="{{ $disposisi->perihal }}" style="margin-bottom: 10px" autofocus required>
                        <div class="text-danger">
                            @error('perihal')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Asal Surat</label>
                        <input type="text" name="asal_surat" class="form-control" value="{{ $disposisi->asal_surat }}" style="margin-bottom: 10px" required>
                        <div class="text-danger">
                            @error('asal_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Nomor Surat</label>
                        <input type="text" name="no_surat" class="form-control" value="{{ $disposisi->no_surat }}" style="margin-bottom: 10px" required>
                        <div class="text-danger">
                            @error('no_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Kode Surat</label>
                        <input type="text" name="kode_surat" class="form-control" value="{{ $disposisi->kode_surat }}" style="margin-bottom: 10px" required>
                        <div class="text-danger">
                            @error('kode_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Tanggal Surat</label>
                        <input type="date" name="tgl_surat" class="form-control" value="{{ $disposisi->tgl_surat }}" style="margin-bottom: 10px" required>
                        <div class="text-danger">
                            @error('tgl_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Tanggal Terima Surat</label>
                        <input type="date" name="tgl_terima" class="form-control" value="{{ $disposisi->tgl_terima }}" style="margin-bottom: 10px" required>
                        <div class="text-danger">
                            @error('tgl_terima')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Tanggal Penyelesaian</label>
                        <input type="date" name="tgl_selesai" class="form-control" value="{{ $disposisi->tgl_selesai }}" style="margin-bottom: 10px" required>
                        <div class="text-danger">
                            @error('tgl_selesai')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Tanggal Disposisi</label>
                        <input type="date" name="tgl_disposisi" class="form-control" value="{{ $disposisi->tgl_disposisi }}" style="margin-bottom: 10px" required>
                        <div class="text-danger">
                            @error('tgl_disposisi')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                   <div class="col-md-6">
                        <label class="form-label">Isi Ringkas</label>
                        <textarea name="isi_ringkas" class="form-control" rows="3" style="margin-bottom: 10px" required>{{ $disposisi->isi_ringkas }}</textarea>
                        <div class="text-danger">
                            @error('isi_ringkas')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Catatan Disposisi</label>
                        <textarea name="isi_disposisi" class="form-control" rows="3" style="margin-bottom: 10px" required>{{ $disposisi->isi_disposisi }}</textarea>
                        <div class="text-danger">
                            @error('isi_disposisi')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="" class="form-label">Yang Menyetujui</label>
                        <select name="user_approve" class="form-control" style="margin-bottom: 10px">
                            @foreach ($user_approve as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>                    

                    <div class="col-md-6">
                        <label class="form-label">Upload File Surat</label>
                        <input type="file" name="file_surat" class="form-control" value="{{ $disposisi->file_surat }}" style="margin-bottom: 10px" required>
                        <div class="text-danger">
                            @error('file_surat')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-success" style="margin-top: 15px">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
