<form action="{{ route('update_lahir', $lahirEdit->id ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Yang Menyetujui</label>                      
                    <select name="user_approve" id="user_approve" class="form-control">
                        <option value="default">Pilih...</option>
                        @foreach ($user_approve as $user)
                            <option value="{{ $user->id }}" {{ $lahirEdit->user_approve == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select> 
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">No Surat</label>
                    <input type="text" name="no_surat" class="form-control" value="{{ $lahirEdit->no_surat }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label" style="margin-top: 10px">Nama Bayi</label>
                    <input type="text" name="nama_bayi" class="form-control" value="{{ $lahirEdit->nama_bayi }}" required>                       
                </div>

                <div class="col-md-2">
                    <label class="form-label" style="margin-top: 10px">Hari Lahir Bayi</label>
                    <select name="hari_lahir" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Senin" {{ $lahirEdit->hari_lahir == 'Senin' ? 'selected' : '' }}>Senin</option>
                        <option value="Selasa" {{ $lahirEdit->hari_lahir == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                        <option value="Rabu" {{ $lahirEdit->hari_lahir == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                        <option value="Kamis" {{ $lahirEdit->hari_lahir == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                        <option value="Jumat" {{ $lahirEdit->hari_lahir == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                        <option value="Sabtu" {{ $lahirEdit->hari_lahir == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        <option value="Minggu" {{ $lahirEdit->hari_lahir == 'Minggu' ? 'selected' : '' }}>Minggu</option>                    
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Lahir Bayi</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="{{ $lahirEdit->tgl_lahir }}" required>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Jam/Pukul Lahir Bayi</label>
                    <input type="text" name="pukul_lahir" class="form-control" value="{{ $lahirEdit->pukul_lahir }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Jenis Kelamin Bayi</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Laki-Laki" {{ $lahirEdit->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ $lahirEdit->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tempat Lahir Bayi</label>
                    <select name="tempat_lahir" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Rumah" {{ $lahirEdit->tempat_lahir == 'Rumah' ? 'selected' : '' }}>Rumah</option>
                        <option value="Rumah Bidan" {{ $lahirEdit->tempat_lahir == 'Rumah Bidan' ? 'selected' : '' }}>Rumah Bidan</option>
                        <option value="Polindes" {{ $lahirEdit->tempat_lahir == 'Polindes' ? 'selected' : '' }}>Polindes</option>
                        <option value="Rumah Bersalin" {{ $lahirEdit->tempat_lahir == 'Rumah Bersalin' ? 'selected' : '' }}>Rumah Bersalin</option>
                        <option value="Puskesmas" {{ $lahirEdit->tempat_lahir == 'Puskesmas' ? 'selected' : '' }}>Puskesmas</option>
                        <option value="Rumah Sakit" {{ $lahirEdit->tempat_lahir == 'Rumah Sakit' ? 'selected' : '' }}>Rumah Sakit</option>
                    </select>
                </div>

                

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" value="{{ $lahirEdit->nama_ibu }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">NIK Ibu</label>
                    <input type="number" name="nik_ibu" class="form-control" value="{{ $lahirEdit->nik_ibu }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="form-control" value="{{ $lahirEdit->nama_ayah }}" required>                       
                </div>
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">NIK Ayah</label>
                    <input type="number" name="nik_ayah" class="form-control" value="{{ $lahirEdit->nik_ayah }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $lahirEdit->alamat }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" value="{{ $lahirEdit->kecamatan }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Kabupaten</label>
                    <input type="text" name="kabupaten" class="form-control" value="{{ $lahirEdit->kabupaten }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                    <input type="date" name="tgl_surat" class="form-control" value="{{ $lahirEdit->tgl_surat }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Pengantaran</label>
                    <select name="is_antar" class="form-control">
                        <option value="default">Pilih..</option>
                        <option value="Y" {{ $lahirEdit->is_antar == 'Y' ? 'selected' : '' }}>Ya</option>
                        <option value="N" {{ $lahirEdit->is_antar == 'N' ? 'selected' : '' }}>Tidak</option>
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


