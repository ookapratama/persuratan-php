
<div class="content">
    <div class="row">
        <div class="row g-3">

            <div class="col-md-4">
                <label class="form-label">No Surat</label>
                <input type="text" class="form-control" value="{{ $sktmEdit->no_surat }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-4">
                <label class="form-label">Yang Menyetujui</label>                      
                <input class="form-control" value="{{ $sktmEdit->approve_by->name }}" style="margin-bottom: 10px" readonly>   
            </div>

            <div class="col-md-4">
                <label class="form-label">Tanggal Surat</label>
                <input type="date" name="tgl_surat" class="form-control" value="{{ $sktmEdit->tgl_surat }}" style="margin-bottom: 10px" readonly>                       
            </div>

            <div class="col-md-4">
                <label class="form-label">Nama Pemohon</label>
                <input type="text" name="nama_pemohon" class="form-control" value="{{ $sktmEdit->nama_pemohon }}" style="margin-bottom: 10px" readonly>                        
            </div>

            <div class="col-md-4">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ $sktmEdit->tempat_lahir }}" style="margin-bottom: 10px" readonly>                       
            </div>

            <div class="col-md-4">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" value="{{ $sktmEdit->tgl_lahir }}" style="margin-bottom: 10px" readonly>                      
            </div>

            <div class="col-md-4">
                <label class="form-label">NIK</label>
                <input type="number" name="nik" class="form-control" value="{{ $sktmEdit->nik }}" style="margin-bottom: 10px" readonly>                       
            </div>

            <div class="col-md-4">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" value="{{ $sktmEdit->pekerjaan }}" style="margin-bottom: 10px" readonly>                        
            </div>

            <div class="col-md-4">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $sktmEdit->alamat }}" style="margin-bottom: 10px" readonly>
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






