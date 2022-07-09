<form action="{{ route('update_usaha', $usahaEdit->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Yang Menyetujui</label>                      
                    <select name="user_approve" id="user_approve" class="form-control">
                        <option value="default">Pilih...</option>
                        @foreach ($user_approve as $user)
                            <option value="{{ $user->id }}" {{ $usahaEdit->user_approve == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select> 
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">No Surat</label>
                    <input type="text" name="no_surat" class="form-control" value="{{ $usahaEdit->no_surat }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Nama Pemohon</label>
                    <input name="nama_pemohon" class="form-control" value="{{ $usahaEdit->nama_pemohon }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir"  class="form-control" value="{{ $usahaEdit->tempat_lahir }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="{{ $usahaEdit->tgl_lahir }}" required>                      
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Laki-Laki" {{ $usahaEdit->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ $usahaEdit->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Agama</label>
                    <select name="agama" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Islam" {{ $usahaEdit->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ $usahaEdit->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Hindu" {{ $usahaEdit->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ $usahaEdit->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Konghucu" {{ $usahaEdit->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="{{ $usahaEdit->pekerjaan }}" required>                        
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $usahaEdit->alamat }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">NIK</label>
                    <input type="number" name="nik" class="form-control" value="{{ $usahaEdit->nik }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Jenis Usaha</label>
                    <input type="text" name="jenis_usaha" class="form-control" value="{{ $usahaEdit->jenis_usaha }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Alamat Usaha</label>
                    <input type="text" name="alamat_usaha" class="form-control" value="{{ $usahaEdit->alamat_usaha }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tahun Mulai Usaha</label>
                    <select name="tahun_usaha" class="form-control">
                        <option value="default">Pilih..</option>
                        <?php $years = range(2000, strftime("%Y", time())); ?>
                        @foreach($years as $year)
                          <option value="{{ $year }}" {{ $usahaEdit->tahun_usaha == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                      </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                    <input type="date" name="tgl_surat" class="form-control" value="{{ $usahaEdit->tgl_surat }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Pengantaran</label>
                    <select name="is_antar" class="form-control">
                        <option value="default">Pilih..</option>
                        <option value="Y" {{ $usahaEdit->is_antar == 'Y' ? 'selected' : '' }}>Ya</option>
                        <option value="N" {{ $usahaEdit->is_antar == 'N' ? 'selected' : '' }}>Tidak</option>
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
