<form action="{{ route('update_baik', $baikEdit->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Yang Menyetujui</label>                      
                    <select name="user_approve" id="user_approve" class="form-control">
                        <option value="default">Pilih...</option>
                        @foreach ($user_approve as $user)
                            <option value="{{ $user->id }}" {{ $baikEdit->user_approve == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select> 
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">No Surat</label>
                    <input type="text" name="no_surat" class="form-control" value="{{ $baikEdit->no_surat }}" required>
                </div>             
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                    <input type="date" name="tgl_surat" class="form-control" value="{{ $baikEdit->tgl_surat }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Nama Pemohon</label>
                    <input type="text" name="nama_pemohon" class="form-control" value="{{ $baikEdit->nama_pemohon }}" required>                        
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $baikEdit->tempat_lahir }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="{{ $baikEdit->tgl_lahir }}" required>                      
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">NIK</label>
                    <input type="number" name="nik" class="form-control" value="{{ $baikEdit->nik }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Laki-Laki" {{ $baikEdit->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ $baikEdit->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Status Perkawinan</label>
                    <select name="status_kawin" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Kawin" {{ $baikEdit->status_kawin == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                        <option value="Belum Kawin" {{ $baikEdit->status_kawin == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Kewarganegaraan</label>
                    <input type="text" name="warga_negara" class="form-control" value="{{ $baikEdit->warga_negara }}" required>                       
                </div>                

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="{{ $baikEdit->pekerjaan }}" required>                        
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $baikEdit->alamat }}" required>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Pengantaran</label>
                    <select name="is_antar" class="form-control">
                        <option value="default">Pilih..</option>
                        <option value="Y" {{ $baikEdit->is_antar == 'Y' ? 'selected' : '' }}>Ya</option>
                        <option value="N"{{ $baikEdit->is_antar == 'N' ? 'selected' : '' }}>Tidak</option>
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
