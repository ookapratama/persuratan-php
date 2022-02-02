<form action="" method="POST">
    @csrf
    <div class="form-group">
        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" required>               
    </div>
    
    <div class="form-group">
        <input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email" required>                   
    </div>
    
    <div class="form-group">
        <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan" required>                   
    </div>
    
    <div class="form-group">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>               
    </div>
    
    <div class="form-group">
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>                    
    </div>
    
    <div class="form-group">
        <select name="level_id" class="form-control" id="level_id">
            <option value="default">Pilih Level</option>
            <option value="4">Admin</option>
            <option value="2">Pimpinan</option>
            <option value="1">Kurir</option>
        </select>              
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm pull-left" id="btnSimpan">Simpan</button>
    </div> 

</form>