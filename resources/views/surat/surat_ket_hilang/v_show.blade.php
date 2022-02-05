<div class="content">
    <div class="row">
        <div class="row g-3">

            <div class="col-md-3">
                <label class="form-label">Yang Menyetujui</label>                      
                <input class="form-control" value="{{ $hilangShow->approve_by->name }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label">No Surat</label>
                <input class="form-control" value="{{ $hilangShow->no_surat }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label">Perihal</label>
                <input class="form-control" value="{{ $hilangShow->perihal }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label">Lampiran</label>
                <input class="form-control" value="{{ $hilangShow->lampiran }}" style="margin-bottom: 10px" readonly>
            </div>
            
            <div class="col-md-3">
                <label class="form-label">Tanggal Surat</label>
                <input class="form-control" value="{{ $hilangShow->tgl_surat }}" style="margin-bottom: 10px" readonly>                       
            </div>

            <div class="col-md-4">
                <label class="form-label">Nama Pemohon</label>
                <input class="form-control" value="{{ $hilangShow->nama_pemohon }}" style="margin-bottom: 10px" readonly>                        
            </div>

            <div class="col-md-3">
                <label class="form-label">Jenis Kelamin</label>
                <input class="form-control" value="{{ $hilangShow->jenis_kelamin }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-2">
                <label class="form-label">Tempat Lahir</label>
                <input class="form-control" value="{{ $hilangShow->tempat_lahir }}" style="margin-bottom: 10px" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label">Tanggal Lahir</label>
                <input class="form-control" value="{{ $hilangShow->tgl_lahir }}" style="margin-bottom: 10px" readonly>                      
            </div>

            <div class="col-md-3">
                <label class="form-label">NIK</label>
                <input class="form-control" value="{{ $hilangShow->nik }}" style="margin-bottom: 10px" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label">Status Perkawinan</label>
                <input class="form-control" value="{{ $hilangShow->status_kawin }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label">Agama</label>
                <input class="form-control" value="{{ $hilangShow->agama }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-4">
                <label class="form-label">Pekerjaan</label>
                <input class="form-control" value="{{ $hilangShow->pekerjaan }}" style="margin-bottom: 10px" readonly>                        
            </div>

            <div class="col-md-4">
                <label class="form-label">Alamat</label>
                <input class="form-control" value="{{ $hilangShow->alamat }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-4">
                <label class="form-label">Benda Hilang</label>
                <input class="form-control" value="{{ $hilangShow->benda_hilang }}" style="margin-bottom: 10px" readonly>
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