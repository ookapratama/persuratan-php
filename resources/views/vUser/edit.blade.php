<form action="{{ route('user_update', $edit->id) }}" method="POST" id="formEdit">
    @csrf
    <div class="form-group">
        <label class="form-label">Nama</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $edit->name }}" placeholder="Nama Lengkap" required>               
    </div>
    
    <div class="form-group">
        <label class="form-label">Alamat</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $edit->email }}" placeholder="Alamat Email" required>                   
    </div>
    
    <div class="form-group">
        <label class="form-label">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $edit->jabatan }}" placeholder="Jabatan" required>                   
    </div>
    
    <div class="form-group">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>               
    </div>
    
    <div class="form-group">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>                    
    </div>
    
    <div class="form-group">
        <label class="form-label">Level User</label>
        <select name="level_id" class="form-control" id="level_id">
            <option value="default">Pilih Level</option>
            <option value="4" {{ $edit->level_id == '4' ? 'selected' : '' }}>Admin</option>
            <option value="2" {{ $edit->level_id == '2' ? 'selected' : '' }}>Pimpinan</option>
            <option value="1" {{ $edit->level_id == '1' ? 'selected' : '' }}>Kurir</option>
        </select>              
    </div>
    
    <div class="modal-footer">
        <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</a>
        <div class="form-group">
            <button type="submit" id="btnUpdate" class="btn btn-success btn-sm pull-left">Simpan</button>
        </div>
    </div>

</form>