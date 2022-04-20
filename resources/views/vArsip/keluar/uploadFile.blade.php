<form action="{{ route('upload_arsipKeluar', $file->id) }}" method="POST" id="formUploadKeluar" enctype="multipart/form-data">
    @csrf
    <div class="col">
        <div class="row g-3">
            <div class="col-md-12">
                <label class="form-label" >Upload File Surat Keluar </label><span> | File size max 2Mb dan berformat pdf</span>
                <input type="file" name="file_surat" id="file_surat" class="form-control" style="margin-bottom: 10px">
            </div>
            <input type="hidden" name="oldFile" value="{{ $file->file_surat }}">
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" id="btnUploadKeluar" class="btn btn-primary btn-success pull-left">Update</button>
        <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Batal</a>
    </div>
</form>