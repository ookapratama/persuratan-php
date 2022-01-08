@extends('layout.v_template')
@section('title', 'Add User')
@section('titleNav', 'Kelola User > Tambah User')

@section('content')
    <a href="/user" class="btn btn-sm btn-warning">Kembali</a>
    <br>
    <br>

    <form action="/user/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-4">

                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" autofocus required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <div class="text-danger">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <div class="text-danger">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <div class="text-danger">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input name="level_id" class="form-control" placeholder="Level" value="{{ old('level_id') }}" required>
                        <div class="form-text"><h6>Level : 1. Kurir | 2. Kepala Desa | 3. Super Admin | 4. Admin</h6></div>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <div class="text-danger">
                            @error('level_id')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
