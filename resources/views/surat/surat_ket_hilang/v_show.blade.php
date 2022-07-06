<div class="content">
    <div class="row">
        <div class="row g-3">

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Yang Menyetujui</label>                      
                <input class="form-control" value="{{ $hilangShow->approve_by->name }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">No Surat</label>
                <input class="form-control" value="{{ $hilangShow->no_surat }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Perihal</label>
                <input class="form-control" value="{{ $hilangShow->perihal }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Lampiran</label>
                <input class="form-control" value="{{ $hilangShow->lampiran }}" readonly>
            </div>
            
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                <input class="form-control" value="{{ $hilangShow->tgl_surat }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Nama Pemohon</label>
                <input class="form-control" value="{{ $hilangShow->nama_pemohon }}" readonly>                        
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Jenis Kelamin</label>
                <input class="form-control" value="{{ $hilangShow->jenis_kelamin }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tempat Lahir</label>
                <input class="form-control" value="{{ $hilangShow->tempat_lahir }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Lahir</label>
                <input class="form-control" value="{{ $hilangShow->tgl_lahir }}" readonly>                      
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">NIK</label>
                <input class="form-control" value="{{ $hilangShow->nik }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Status Perkawinan</label>
                <input class="form-control" value="{{ $hilangShow->status_kawin }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Agama</label>
                <input class="form-control" value="{{ $hilangShow->agama }}" readonly>
            </div>

            <div class="col-md-4">
                <label class="form-label" style="margin-top: 10px">Pekerjaan</label>
                <input class="form-control" value="{{ $hilangShow->pekerjaan }}" readonly>                        
            </div>

            <div class="col-md-4">
                <label class="form-label" style="margin-top: 10px">Alamat</label>
                <input class="form-control" value="{{ $hilangShow->alamat }}" readonly>
            </div>

            <div class="col-md-4">
                <label class="form-label" style="margin-top: 10px">Benda Hilang</label>
                <input class="form-control" value="{{ $hilangShow->benda_hilang }}" readonly>
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