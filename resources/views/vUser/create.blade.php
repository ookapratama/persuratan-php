<form action="{{ route('user_insert') }}" method="POST" id="formCreate">
    @csrf
    <div class="form-group">
        <label class="form-label">Nama</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap">               
    </div>
    
    <div class="form-group">
        <label class="form-label">Alamat</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email">                   
    </div>
    
    <div class="form-group">
        <label class="form-label">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan">                   
    </div>
    
    <div class="form-group">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">               
    </div>
    
    <div class="form-group">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">                    
    </div>
    
    <div class="form-group">
        <label class="form-label">Level User</label>
        <select name="level_id" class="form-control" id="level_id">
            <option value="default">Pilih Level</option>
            <option value="4">Admin</option>
            <option value="2">Pimpinan</option>
            <option value="1">Kurir</option>
        </select>              
    </div>
    
    <div class="modal-footer">
        <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</a>
        <div class="form-group">
            <button type="submit" id="btnCreate" class="btn btn-success btn-sm pull-left">Simpan</button>
        </div>
    </div>

</form>