<form action="{{ route('update_disposisi', $disposisi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label" style="margin-top: 10px">Perihal</label>
                    <input type="text" name="perihal" class="form-control" value="{{ $disposisi->perihal }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Asal Surat</label>
                    <input type="text" name="asal_surat" class="form-control" value="{{ $disposisi->asal_surat }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Nomor Surat</label>
                    <input type="text" name="no_surat" class="form-control" value="{{ $disposisi->no_surat }}" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label" style="margin-top: 10px">Kode Surat</label>
                    <input type="text" name="kode_surat" class="form-control" value="{{ $disposisi->kode_surat }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                    <input type="date" name="tgl_surat" class="form-control" value="{{ $disposisi->tgl_surat }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Terima Surat</label>
                    <input type="date" name="tgl_terima" class="form-control" value="{{ $disposisi->tgl_terima }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Penyelesaian</label>
                    <input type="date" name="tgl_selesai" class="form-control" value="{{ $disposisi->tgl_selesai }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Disposisi</label>
                    <input type="date" name="tgl_disposisi" class="form-control" value="{{ $disposisi->tgl_disposisi }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label" style="margin-top: 10px">Isi Ringkas</label>
                    <textarea name="isi_ringkas" class="form-control" rows="3" style="resize:none;">{{ $disposisi->isi_ringkas }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label" style="margin-top: 10px">Catatan Disposisi</label>
                    <textarea name="isi_disposisi" class="form-control" rows="3" style="resize:none;">{{ $disposisi->isi_disposisi }}</textarea>
                </div>
                
                <div class="col-md-6">
                    <label for="" class="form-label" style="margin-top: 10px">Yang Menyetujui</label>
                    <select name="user_approve" class="form-control">
                        <option value="default">Pilih...</option>
                        @foreach ($user_approve as $user)
                            <option value="{{ $user->id }}" {{ $disposisi->user_approve == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>        
                
                <input type="hidden" name="oldFile" value="{{ $disposisi->file_surat }}">

                <div class="col-md-6">
                    <label class="form-label" style="margin-top: 10px">Upload File Surat</label>
                    <input type="file" name="file_surat" class="form-control">
                    <span><strong>Current File : </strong>{{ $disposisi->file_surat }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</a>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm pull-left">Update</button>
        </div>
    </div>
</form>

