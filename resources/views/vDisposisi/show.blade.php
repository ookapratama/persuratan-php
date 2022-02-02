<div class="content">
    <div class="row">
        <div class="row g-3">

            <div class="col-md-4">
                <label class="form-label">Perihal</label>
                <input type="text" name="perihal" class="form-control" value="{{ $disposisi->perihal }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label">Asal Surat</label>
                <input type="text" name="asal_surat" class="form-control" value="{{ $disposisi->asal_surat }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label">Nomor Surat</label>
                <input type="text" name="no_surat" class="form-control" value="{{ $disposisi->no_surat }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-2">
                <label class="form-label">Kode Surat</label>
                <input type="text" name="kode_surat" class="form-control" value="{{ $disposisi->kode_surat }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label">Tanggal Surat</label>
                <input type="date" name="tgl_surat" class="form-control" value="{{ $disposisi->tgl_surat }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label">Tanggal Terima Surat</label>
                <input type="date" name="tgl_terima" class="form-control" value="{{ $disposisi->tgl_terima }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label">Tanggal Penyelesaian</label>
                <input type="date" name="tgl_selesai" class="form-control" value="{{ $disposisi->tgl_selesai }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label">Tanggal Disposisi</label>
                <input type="date" name="tgl_disposisi" class="form-control" value="{{ $disposisi->tgl_disposisi }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-6">
                <label class="form-label">Isi Ringkas</label>
                <textarea name="isi_ringkas" class="form-control" rows="3" style="margin-bottom: 10px; resize:none;" readonly>{{ $disposisi->isi_ringkas }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label">Catatan Disposisi</label>
                <textarea name="isi_disposisi" class="form-control" rows="3" style="margin-bottom: 10px; resize:none;" readonly>{{ $disposisi->isi_disposisi }}</textarea>
            </div>
            
            <div class="col-md-6">
                <label for="" class="form-label">Yang Menyetujui</label>
                <input class="form-control" value="{{ $disposisi->approve_by->name }}" style="margin-bottom: 10px" readonly>
            </div>

            <div class="col-md-12">
                <h4>&emsp;</h4>
            </div>

            <div class="modal-footer">
                <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</a>
            </div>
        </div>
    </div>
</div>


