<form action="{{ route('insert_disposisi') }}" method="POST" id="formCreateDisposisi" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="row g-3">
                
                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Perihal</label>
                    <input type="text" name="perihal" id="perihal" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Asal Surat</label>
                    <input type="text" name="asal_surat" id="asal_surat" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Nomor Surat</label>
                    <input type="text" name="no_surat" id="no_surat" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Kode Surat</label>
                    <input type="text" name="kode_surat" id="kode_surat" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Surat</label>
                    <input type="date" name="tgl_surat" id="tgl_surat" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Terima Surat</label>
                    <input type="date" name="tgl_terima" id="tgl_terima" class="form-control" value="{{ (new DateTime())->format('Y-m-d'); }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Penyelesaian</label>
                    <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" value="{{ (new DateTime())->format('Y-m-d'); }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label" style="margin-top: 10px">Tanggal Disposisi</label>
                    <input type="date" name="tgl_disposisi" id="tgl_disposisi" class="form-control" value="{{ (new DateTime())->format('Y-m-d'); }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label" style="margin-top: 10px">Isi Ringkas</label>
                    <textarea name="isi_ringkas" id="isi_ringkas" class="form-control" rows="2"  style="resize:none;"></textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label" style="margin-top: 10px">Catatan Disposisi</label>
                    <textarea name="isi_disposisi" id="isi_disposisi" class="form-control" rows="2" style="resize:none;"></textarea>
                </div>
                
                <div class="col-md-6">
                    <label for="" class="form-label" style="margin-top: 10px">Yang Menyetujui</label>
                    <select name="user_approve" id="user_approve" class="form-control">
                        <option value="default">Pilih...</option>
                        @foreach ($user_approve as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>                    

                <div class="col-md-6">
                    <label class="form-label" style="margin-top: 10px">Upload File Surat </label><span> | File size max 2Mb dan berformat pdf</span>
                    <input type="file" name="file_surat" id="file_surat" class="form-control">
                </div>

            </div>
        </div>
    </div>

    <div class="modal-footer">
        <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</a>
        <div class="form-group">
            <button type="submit" id="btnCreateDisposisi" class="btn btn-success btn-sm pull-left">Simpan</button>
        </div>
    </div>
</form>