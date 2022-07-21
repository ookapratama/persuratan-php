<div class="content">
    <div class="row">
        <div class="row g-3">

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Yang Menyetujui</label>                      
                <input class="form-control" value="{{ $baikShow->approve_by->name }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">No Surat</label>
                <input class="form-control" value="{{ $baikShow->no_surat }}" readonly>
            </div>
            
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                <input class="form-control" value="{{ $baikShow->tgl_surat }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Nama Pemohon</label>
                <input class="form-control" value="{{ $baikShow->nama_pemohon }}" readonly>                        
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tempat Lahir</label>
                <input class="form-control" value="{{ $baikShow->tempat_lahir }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Lahir</label>
                <input class="form-control" value="{{ $baikShow->tgl_lahir }}" readonly>                      
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">NIK</label>
                <input class="form-control" value="{{ $baikShow->nik }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Jenis Kelamin</label>
                <input class="form-control" value="{{ $baikShow->jenis_kelamin }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Status Perkawinan</label>
                <input class="form-control" value="{{ $baikShow->status_kawin }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Kewarganegaraan</label>
                <input class="form-control" value="{{ $baikShow->warga_negara }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Pekerjaan</label>
                <input class="form-control" value="{{ $baikShow->pekerjaan }}" readonly>                        
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Alamat</label>
                <input class="form-control" value="{{ $baikShow->alamat }}" readonly>
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