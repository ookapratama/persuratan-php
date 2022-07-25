<form action="{{ route('store_mati') }}" method="POST" id="formCreateMati" enctype="multipart/form-data">
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

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Nama</label>
                    <input name="nama_pemohon" id="nama_pemohon" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">NIK</label>
                    <input type="number" name="nik" id="nik" class="form-control">                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">No. KK</label>
                    <input type="number" name="no_kk" id="no_kk" class="form-control">                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">                      
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Kewarganegaraan</label>
                    <input type="text" name="warga_negara" id="warga_negara" class="form-control" value="Indonesia">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Agama</label>
                    <select name="agama" id="agama" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Status Perkawinan</label>
                    <select name="status_kawin" id="status_kawin" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control">                        
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Hari Kematian</label>
                    <select name="hari_mati" id="hari_mati" class="form-control">
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
                    <label class="form-label" style="margin-top: 10px">Tanggal Kematian</label>
                    <input type="date" name="tgl_mati" id="tgl_mati" class="form-control">                      
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tempat Kematian</label>
                    <input type="text" name="tempat_mati" id="tempat_mati" class="form-control">
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="Wotu">
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="form-control" value="Luwu Timur">
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="form-control" value="Sulawesi Selatan">
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Sebab Kematian</label>
                    <input type="text" name="sebab_mati" id="sebab_mati" class="form-control">
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
            <button type="submit" id="btnCreateMati" class="btn btn-success pull-left">Simpan</button>
        </div>
    </div>
</form>
