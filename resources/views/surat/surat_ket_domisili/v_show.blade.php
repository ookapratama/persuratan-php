<div class="content">
    <div class="row">
        <div class="row g-3">

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Yang Menyetujui</label>                      
                <input class="form-control" value="{{ $domisiliShow->approve_by->name }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">No Surat</label>
                <input class="form-control" value="{{ $domisiliShow->no_surat }}" readonly>
            </div>
            
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                <input class="form-control" value="{{ $domisiliShow->tgl_surat }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Nama Pemohon</label>
                <input class="form-control" value="{{ $domisiliShow->nama_pemohon }}" readonly>                        
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Jenis Kelamin</label>
                <input class="form-control" value="{{ $domisiliShow->jenis_kelamin }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tempat Lahir</label>
                <input class="form-control" value="{{ $domisiliShow->tempat_lahir }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Lahir</label>
                <input class="form-control" value="{{ $domisiliShow->tgl_lahir }}" readonly>                      
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">NIK</label>
                <input class="form-control" value="{{ $domisiliShow->nik }}" readonly>                       
            </div>

            <div class="col-md-4">
                <label class="form-label" style="margin-top: 10px">Agama</label>
                <input class="form-control" value="{{ $domisiliShow->agama }}" readonly>
            </div>

            <div class="col-md-4">
                <label class="form-label" style="margin-top: 10px">Pekerjaan</label>
                <input class="form-control" value="{{ $domisiliShow->pekerjaan }}" readonly>                        
            </div>

            <div class="col-md-4">
                <label class="form-label" style="margin-top: 10px">Alamat</label>
                <input class="form-control" value="{{ $domisiliShow->alamat }}" readonly>
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