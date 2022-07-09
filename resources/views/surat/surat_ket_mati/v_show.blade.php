<div class="content">
    <div class="row">
        <div class="row g-3">

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Yang Menyetujui</label>                      
                <input class="form-control" value="{{ $matiShow->approve_by->name }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">No Surat</label>
                <input class="form-control" value="{{ $matiShow->no_surat }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Nama</label>
                <input class="form-control" value="{{ $matiShow->nama_pemohon }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">NIK</label>
                <input class="form-control" value="{{ $matiShow->nik }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">No. KK</label>
                <input class="form-control" value="{{ $matiShow->no_kk }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tempat Lahir</label>
                <input class="form-control" value="{{ $matiShow->tempat_lahir }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Lahir</label>
                <input class="form-control" value="{{ $matiShow->tgl_lahir }}" readonly>                      
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Jenis Kelamin</label>
                <input class="form-control" value="{{ $matiShow->jenis_kelamin }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Kewarganegaraan</label>
                <input class="form-control" value="{{ $matiShow->warga_negara }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Agama</label>
                <input class="form-control" value="{{ $matiShow->agama }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Status Perkawinan</label>
                <input class="form-control" value="{{ $matiShow->status_kawin }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Pekerjaan</label>
                <input class="form-control" value="{{ $matiShow->pekerjaan }}" readonly>                        
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Alamat</label>
                <input class="form-control" value="{{ $matiShow->alamat }}" readonly>
            </div>
            
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Hari Kematian</label>
                <input class="form-control" value="{{ $matiShow->hari_mati }}" readonly>
            </div>
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Kematian</label>
                <input class="form-control" value="{{ $matiShow->tgl_mati }}" readonly>
            </div>
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tempat Kematian</label>
                <input class="form-control" value="{{ $matiShow->tempat_mati }}" readonly>
            </div>
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Kecamatan</label>
                <input class="form-control" value="{{ $matiShow->kecamatan }}" readonly>
            </div>
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Kabupaten</label>
                <input class="form-control" value="{{ $matiShow->kabupaten }}" readonly>
            </div>
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Provinsi</label>
                <input class="form-control" value="{{ $matiShow->provinsi }}" readonly>
            </div>
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Sebab Kematian</label>
                <input class="form-control" value="{{ $matiShow->sebab_mati }}" readonly>
            </div>
            
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                <input class="form-control" value="{{ $matiShow->tgl_surat }}" readonly>                       
            </div>

            <div class="col-md-12">
                <h4>&emsp;</h4>
            </div>

            <div class="col-md-12">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>