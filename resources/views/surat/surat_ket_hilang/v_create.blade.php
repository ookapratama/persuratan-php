<form action="{{ route('store_hilang') }}" method="POST" id="formCreateHilang" enctype="multipart/form-data">
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
                    <label class="form-label" style="margin-top: 10px">Perihal</label>
                    <input type="text" name="perihal" id="perihal" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Lampiran</label>
                    <input type="text" name="lampiran" id="lampiran" class="form-control">
                </div>
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                    <input type="date" name="tgl_surat" id="tgl_surat" class="form-control">                       
                </div>

                <div class="col-md-4">
                    <label class="form-label" style="margin-top: 10px">Nama Pemohon</label>
                    <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-control">                        
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="default">Pilih...</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label" style="margin-top: 10px">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">                       
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">                      
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">NIK</label>
                    <input type="number" name="nik" id="nik" class="form-control">                       
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

                <div class="col-md-4">
                    <label class="form-label" style="margin-top: 10px">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control">                        
                </div>

                <div class="col-md-4">
                    <label class="form-label" style="margin-top: 10px">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label" style="margin-top: 10px">Benda Hilang</label>
                    <input type="text" name="benda_hilang" id="benda_hilang" class="form-control">
                </div>

                <div class="col-md-4">
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
            <button type="submit" id="btnCreateHilang" class="btn btn-success pull-left">Simpan</button>
        </div>
    </div>
</form>
