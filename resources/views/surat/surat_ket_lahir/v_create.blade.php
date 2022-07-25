<form action="{{ route('store_lahir') }}" method="POST" id="formCreateLahir" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Yang Menyetujui</label>                      
                    <select name="user_approve" id="user_approve" class="form-control">
                        <option value="default">Pilih...</option>
                        @foreach ($user_approve as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select> 
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">No Surat</label>
                    <input type="text" name="no_surat" id="no_surat" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label" style="margin-top: 10px">Nama Bayi</label>
                    <input type="text" name="nama_bayi" id="nama_bayi" class="form-control">                       
                </div>

                <div class="col-md-2">
                    <label class="form-label" style="margin-top: 10px">Hari Lahir Bayi</label>
                    <select name="hari_lahir" id="hari_lahir" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>                    
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Lahir Bayi</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                </div>
                
                 <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Jam/Pukul Lahir Bayi</label>
                    <input type="text" name="pukul_lahir" id="pukul_lahir" class="form-control">                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Jenis Kelamin Bayi</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tempat Lahir Bayi</label>
                    <select name="tempat_lahir" id="tempat_lahir" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Rumah">Rumah</option>
                        <option value="Rumah Bidan">Rumah Bidan</option>
                        <option value="Polindes">Polindes</option>
                        <option value="Rumah Bersalin">Rumah Bersalin</option>
                        <option value="Puskesmas">Puskesmas</option>
                        <option value="Rumah Sakit">Rumah Sakit</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Nama Ibu</label>
                    <input type="text" name="nama_ibu" id="nama_ibu" class="form-control">                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">NIK Ibu</label>
                    <input type="number" name="nik_ibu" id="nik_ibu" class="form-control">                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Nama Ayah</label>
                    <input type="text" name="nama_ayah" id="nama_ayah" class="form-control">                       
                </div>
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">NIK Ayah</label>
                    <input type="number" name="nik_ayah" id="nik_ayah" class="form-control">                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                    <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" value="{{ (new DateTime())->format('Y-m-d'); }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Pengantaran</label>
                    <select name="is_antar" id="is_antar" class="form-control">
                        <option value="default">Pilih..</option>
                        <option value="Y">Ya</option>
                        <option value="N">Tidak</option>
                    </select>
                </div>

            </div>
        </div>
    </div>

    <div class="modal-footer">
        <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</a>
        <div class="form-group">
            <button type="submit" id="btnCreateLahir" class="btn btn-success pull-left">Simpan</button>
        </div>
    </div>
</form>

