<form action="{{ route('upload_arsip', $disposisi->id) }}" method="POST" id="formUploadMasuk" enctype="multipart/form-data">
    @csrf      
    <div class="col">
        <div class="row g-3">
            <div class="col-md-12">
                <label class="form-label" >Upload File Disposisi </label><span> | File size max 2Mb dan berformat pdf</span>
                <input type="file" name="file_disposisi" id="file_disposisi" class="form-control" style="margin-bottom: 10px">
            </div>
            <input type="hidden" name="oldFile" value="{{ $disposisi->file_disposisi }}">
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" id="btnUploadMasuk" class="btn btn-primary btn-success pull-left">Update</button>
        <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Batal</a>
    </div>

</form>