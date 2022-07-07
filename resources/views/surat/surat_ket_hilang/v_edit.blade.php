<form action="{{ route('update_hilang', $hilangEdit->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Yang Menyetujui</label>                      
                    <select name="user_approve" id="user_approve" class="form-control">
                        <option value="default">Pilih...</option>
                        @foreach ($user_approve as $user)
                            <option value="{{ $user->id }}" {{ $hilangEdit->user_approve == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select> 
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">No Surat</label>
                    <input type="text" name="no_surat" class="form-control" value="{{ $hilangEdit->no_surat }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Perihal</label>
                    <input class="form-control" value="{{ $hilangEdit->perihal }}" readonly>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Lampiran</label>
                    <input type="text" name="lampiran" class="form-control" value="{{ $hilangEdit->lampiran }}" required>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                    <input type="date" name="tgl_surat" class="form-control" value="{{ $hilangEdit->tgl_surat }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Nama Pemohon</label>
                    <input type="text" name="nama_pemohon" class="form-control" value="{{ $hilangEdit->nama_pemohon }}" required>                        
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Laki-Laki" {{ $hilangEdit->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ $hilangEdit->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $hilangEdit->tempat_lahir }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="{{ $hilangEdit->tgl_lahir }}" required>                      
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">NIK</label>
                    <input type="number" name="nik" class="form-control" value="{{ $hilangEdit->nik }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Status Perkawinan</label>
                    <select name="status_kawin" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Kawin" {{ $hilangEdit->status_kawin == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                        <option value="Belum Kawin" {{ $hilangEdit->status_kawin == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Agama</label>
                    <select name="agama" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Islam" {{ $hilangEdit->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ $hilangEdit->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Hindu" {{ $hilangEdit->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ $hilangEdit->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Konghucu" {{ $hilangEdit->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label" style="margin-top: 10px">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="{{ $hilangEdit->pekerjaan }}" required>                        
                </div>

                <div class="col-md-4">
                    <label class="form-label" style="margin-top: 10px">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $hilangEdit->alamat }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label" style="margin-top: 10px">Benda Hilang</label>
                    <input type="text" name="benda_hilang" class="form-control" value="{{ $hilangEdit->benda_hilang }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label" style="margin-top: 10px">Pengantaran</label>
                    <select name="is_antar" class="form-control">
                        <option value="default">Pilih..</option>
                        <option value="Y" {{ $hilangEdit->is_antar == 'Y' ? 'selected' : '' }}>Ya</option>
                        <option value="N"{{ $hilangEdit->is_antar == 'N' ? 'selected' : '' }}>Tidak</option>
                    </select>
                </div>

            </div>
        </div>
    </div>

    <div class="modal-footer">
        <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</a>
        <div class="form-group">
            <button type="submit" class="btn btn-success pull-left">Update</button>
        </div>
    </div>
</form>
