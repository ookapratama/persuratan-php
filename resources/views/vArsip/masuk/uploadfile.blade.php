<form action="{{ route('upload_arsip', $disposisi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
                 
    <div class="col">
        <div class="row g-3">
            <div class="col-md-12">
                <label class="form-label" >Upload File Disposisi</label>
                <input type="file" name="file_disposisi" class="form-control" style="margin-bottom: 10px" required>
            </div>
            <input type="hidden" name="oldFile" value="{{ $disposisi->file_disposisi }}">
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-success pull-left">Update</button>
        <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Batal</a>
    </div>

</form>