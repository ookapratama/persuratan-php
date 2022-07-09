<form action="{{ route('update_mati', $matiEdit->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Yang Menyetujui</label>                      
                    <select name="user_approve" id="user_approve" class="form-control">
                        <option value="default">Pilih...</option>
                        @foreach ($user_approve as $user)
                            <option value="{{ $user->id }}" {{ $matiEdit->user_approve == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select> 
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">No Surat</label>
                    <input type="text" name="no_surat" class="form-control" value="{{ $matiEdit->no_surat }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Nama</label>
                    <input name="nama_pemohon" class="form-control" value="{{ $matiEdit->nama_pemohon }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">NIK</label>
                    <input type="number" name="nik" class="form-control" value="{{ $matiEdit->nik }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">No. KK</label>
                    <input type="number" name="no_kk" class="form-control" value="{{ $matiEdit->no_kk }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir"  class="form-control" value="{{ $matiEdit->tempat_lahir }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="{{ $matiEdit->tgl_lahir }}" required>                      
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Laki-Laki" {{ $matiEdit->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ $matiEdit->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Kewarganegaraan</label>
                    <input type="text" name="warga_negara" class="form-control" value="{{ $matiEdit->warga_negara }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Agama</label>
                    <select name="agama" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Islam" {{ $matiEdit->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ $matiEdit->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Hindu" {{ $matiEdit->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ $matiEdit->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Konghucu" {{ $matiEdit->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Status Perkawinan</label>
                    <select name="status_kawin" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Kawin" {{ $matiEdit->status_kawin == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                        <option value="Belum Kawin" {{ $matiEdit->status_kawin == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="{{ $matiEdit->pekerjaan }}" required>                        
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $matiEdit->alamat }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Hari Kematian</label>
                    <select name="hari_mati" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Senin" {{ $matiEdit->hari_mati == 'Senin' ? 'selected' : '' }}>Senin</option>
                        <option value="Selasa" {{ $matiEdit->hari_mati == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                        <option value="Rabu" {{ $matiEdit->hari_mati == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                        <option value="Kamis" {{ $matiEdit->hari_mati == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                        <option value="Jumat" {{ $matiEdit->hari_mati == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                        <option value="Sabtu" {{ $matiEdit->hari_mati == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        <option value="Minggu" {{ $matiEdit->hari_mati == 'Minggu' ? 'selected' : '' }}>Minggu</option>                    
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Kematian</label>
                    <input type="date" name="tgl_mati" class="form-control" value="{{ $matiEdit->tgl_mati }}" required>                      
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tempat Kematian</label>
                    <input type="text" name="tempat_mati" class="form-control" value="{{ $matiEdit->tempat_mati }}" required>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" value="{{ $matiEdit->kecamatan }}" required>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Kabupaten</label>
                    <input type="text" name="kabupaten" class="form-control" value="{{ $matiEdit->kabupaten }}" required>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" value="{{ $matiEdit->provinsi }}" required>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Sebab Kematian</label>
                    <input type="text" name="sebab_mati" class="form-control" value="{{ $matiEdit->sebab_mati }}" required>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                    <input type="date" name="tgl_surat" class="form-control" value="{{ $matiEdit->tgl_surat }}" required>                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Pengantaran</label>
                    <select name="is_antar" class="form-control">
                        <option value="default">Pilih..</option>
                        <option value="Y" {{ $matiEdit->is_antar == 'Y' ? 'selected' : '' }}>Ya</option>
                        <option value="N" {{ $matiEdit->is_antar == 'N' ? 'selected' : '' }}>Tidak</option>
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
