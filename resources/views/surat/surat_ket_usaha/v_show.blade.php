<div class="content">
    <div class="row">
        <div class="row g-3">

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Yang Menyetujui</label>                      
                <input class="form-control" value="{{ $usahaShow->approve_by->name }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">No Surat</label>
                <input class="form-control" value="{{ $usahaShow->no_surat }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Nama Pemohon</label>
                <input class="form-control" value="{{ $usahaShow->nama_pemohon }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tempat Lahir</label>
                <input class="form-control" value="{{ $usahaShow->tempat_lahir }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Lahir</label>
                <input class="form-control" value="{{ $usahaShow->tgl_lahir }}" readonly>                      
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Jenis Kelamin</label>
                <input class="form-control" value="{{ $usahaShow->jenis_kelamin }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Agama</label>
                <input class="form-control" value="{{ $usahaShow->agama }}" readonly>
            </div>
            
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Pekerjaan</label>
                <input class="form-control" value="{{ $usahaShow->pekerjaan }}" readonly>                        
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Alamat</label>
                <input class="form-control" value="{{ $usahaShow->alamat }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">NIK</label>
                <input class="form-control" value="{{ $usahaShow->nik }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Jenis Usaha</label>
                <input class="form-control" value="{{ $usahaShow->jenis_usaha }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Alamat Usaha</label>
                <input class="form-control" value="{{ $usahaShow->alamat_usaha }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tahun Mulai Usaha</label>
                <input class="form-control" value="{{ $usahaShow->tahun_usaha }}" readonly>
            </div>
            
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                <input class="form-control" value="{{ $usahaShow->tgl_surat }}" readonly>                       
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