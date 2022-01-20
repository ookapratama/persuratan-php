<div class="modal fade" id="FormEditUser{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit User</h4>
            </div>

            <form id="EditUser" action="{{ route('user_update', $data->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="modal-body">
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $data->name }}" required>   
                    </div>
                
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $data->email }}" required>                   
                    </div>

                    <div class="form-group has-feedback">
                        <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="{{ $data->jabatan }}" required>                   
                    </div>
                
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" id="password2" placeholder="Password" required>               
                    </div>
                
                    <div class="form-group has-feedback">
                        <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm Password" required>                    
                    </div>
            
                    <div class="form-group has-feedback">
                        <select name="level_id" class="form-control">
                            <option>Pilih Level</option>
                            <option value="4" {{ $data->level_id == '4' ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ $data->level_id == '2' ? 'selected' : '' }}>Pimpinan</option>
                            <option value="1" {{ $data->level_id == '1' ? 'selected' : '' }}>Kurir</option>
                        </select>              
                    </div>   
                </div>

                <div class="modal-footer">
                    <a type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</a>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm pull-left">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



