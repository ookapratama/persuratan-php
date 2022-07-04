<div class="content">
    <div class="row">
        <div class="row g-3">

            <div class="col-md-4">
                <label class="form-label" style="margin-top: 10px">Yang Menyetujui</label>                      
                <input class="form-control" value="{{ $lahirShow->approve_by->name }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">No Surat</label>
                <input class="form-control" value="{{ $lahirShow->no_surat }}" readonly>
            </div>

            <div class="col-md-2">
                <label class="form-label" style="margin-top: 10px">Hari Lahir Bayi</label>
                <input class="form-control" value="{{ $lahirShow->hari_lahir }}" readonly>              
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Lahir Bayi</label>
                <input class="form-control" value="{{ $lahirShow->tgl_lahir }}" readonly>                            
            </div>
            
            <div class="col-md-2">
                <label class="form-label" style="margin-top: 10px">Pukul Lahir Bayi</label>
                <input class="form-control" value="{{ $lahirShow->pukul_lahir }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Jenis Kelamin Bayi</label>
                <input class="form-control" value="{{ $lahirShow->jenis_kelamin }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tempat Lahir Bayi</label>
                <input class="form-control" value="{{ $lahirShow->tempat_lahir }}" readonly>                       
            </div>

            <div class="col-md-4">
                <label class="form-label" style="margin-top: 10px">Nama Bayi</label>
                <input class="form-control" value="{{ $lahirShow->nama_bayi }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Nama Ibu</label>
                <input class="form-control" value="{{ $lahirShow->nama_ibu }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">NIK Ibu</label>
                <input class="form-control" value="{{ $lahirShow->nik_ibu }}" readonly>                       
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Nama Ayah</label>
                <input class="form-control" value="{{ $lahirShow->nama_ayah }}" readonly>                       
            </div>
            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">NIK Ayah</label>
                <input class="form-control" value="{{ $lahirShow->nik_ayah }}" readonly>                       
            </div>

            <div class="col-md-4">
                <label class="form-label" style="margin-top: 10px">Alamat</label>
                <input class="form-control" value="{{ $lahirShow->alamat }}" readonly>
            </div>

            <div class="col-md-4">
                <label class="form-label" style="margin-top: 10px">Kecamatan</label>
                <input class="form-control" value="{{ $lahirShow->kecamatan }}" readonly>
            </div>

            <div class="col-md-4">
                <label class="form-label" style="margin-top: 10px">Kabupaten</label>
                <input class="form-control" value="{{ $lahirShow->kabupaten }}" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                <input class="form-control" value="{{ $lahirShow->tgl_surat }}" readonly>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</a>
</div>

