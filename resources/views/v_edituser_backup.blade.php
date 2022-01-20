@extends('layout.v_template')
@section('title', 'Edit')
@section('titleNav', 'Kelola User > Edit User')

@section('content')
    <a href="/user" class="btn btn-sm btn-warning">Kembali</a>
    <br>
    <br>

    <form action="{{ route('user_update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-4">

                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}" required>
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
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" required>
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
                        <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="{{ $user->jabatan }}" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <div class="text-danger">
                            @error('jabatan')
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
                        <input name="level_id" class="form-control" placeholder="Level" value="{{ $user->level_id }}" required>
                        <div class="form-text">     Level : 1. Kurir | 2. Kepala Desa | 3. Super Admin | 4. Admin</div>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <div class="text-danger">
                            @error('level_id')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
