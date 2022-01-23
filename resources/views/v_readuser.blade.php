<table class="table table-striped table-bordered ">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; ?>
        @foreach ($readUser as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->jabatan }}</td>
                <td>{{ $data->level->level_name }}</td>
                <td>

                    {{-- <a class="btn btn-sm btn-warning fa fa-pencil" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#FormEditUser{{ $data->id }}"></a> --}}
                    <button
                        id="editButton"
                        class="btn btn-sm btn-warning fa fa-pencil"
                        onclick="#"
                        title="edit">
                    </button>

                    <button
                        class="btn btn-sm btn-danger fa fa-trash" 
                        onclick="#"
                        title="delete">
                    </button>
                </td>                   
            </tr>

            {{-- <div class="modal modal-danger fade" id="delete{{ $data->id }}">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">{{ $data->name }}</h4>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus user ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                            <a href="{{ route('user_delete', $data->id) }}" class="btn btn-outline">Ya</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            
        @endforeach
    </tbody>
</table>