<div class="content">
    <div class="row">
        <div class="row g-3">

            <div class="col-md-4">
                <label class="form-label">No Surat</label>
                <input type="text" name="no_surat" class="form-control" value="{{ $sktm->no_surat }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-4">
                <label class="form-label">Yang Menyetujui</label>
                <input type="text" name="user_approve" class="form-control" value="{{ $sktm->user_approve }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-4">
                <label class="form-label">Tanggal Surat</label>
                <input type="text" name="tgl_surat" class="form-control" value="{{ $sktm->tgl_surat }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-4">
                <label class="form-label">Nama Pemohon</label>
                <input type="text" name="nama_pemohon" class="form-control" value="{{ $sktm->nama_pemohon }}" style="margin-bottom: 10px" readonly>                        
            </div>

            <div class="col-md-4">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ $sktm->tempat_lahir }}" style="margin-bottom: 10px" readonly>                       
            </div>

            <div class="col-md-4">
                <label class="form-label">Tanggal Lahir</label>
                <input type="text" name="tgl_lahir" class="form-control" value="{{ $sktm->tgl_lahir }}" style="margin-bottom: 10px" readonly>                      
            </div>

            <div class="col-md-4">
                <label class="form-label">NIK</label>
                <input type="number" name="nik" class="form-control" value="{{ $sktm->nik }}" style="margin-bottom: 10px" readonly>                       
            </div>

            <div class="col-md-4">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" value="{{ $sktm->pekerjaan }}" style="margin-bottom: 10px" readonly>                        
            </div>

            <div class="col-md-4">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $sktm->alamat }}" style="margin-bottom: 10px" readonly>
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



