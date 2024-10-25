@extends('admin.layout.master')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Masster / Data Pengguna /</span> Tambah</h4>
<div class="card">
    <div class="container pe-3 ps-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group mt-2
                        @if($errors->has('name'))
                            has-error
                        @endif">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <span class="help-block
                                @if($errors->has('name'))
                                    has-error
                                @endif">
                            {{ $errors->first('name') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group mt-2
                        @if($errors->has('email'))
                            has-error
                        @endif">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        @if($errors->has('email'))
                        <span class="help-block
                                @if($errors->has('email'))
                                    has-error
                                @endif">
                            {{ $errors->first('email') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group mt-2
                        @if($errors->has('password'))
                            has-error
                        @endif">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                        @if($errors->has('password'))
                        <span class="help-block
                                @if($errors->has('password'))
                                    has-error
                                @endif">
                            {{ $errors->first('password') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group mt-2
                        @if($errors->has('password_confirmation'))
                            has-error
                        @endif">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control">
                        @if($errors->has('password_confirmation'))
                        <span class="help-block
                                @if($errors->has('password_confirmation'))
                                    has-error
                                @endif">
                            {{ $errors->first('password_confirmation') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group mt-2
                        @if($errors->has('role'))
                            has-error
                        @endif">
                        <label for="role">Peran</label>
                        <select name="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        @if($errors->has('role'))
                        <span class="help-block
                                @if($errors->has('role'))
                                    has-error
                                @endif">
                            {{ $errors->first('role') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group mt-2
                    @if($errors->has('role'))
                        has-error
                    @endif">
                    <label for="role">Status</label>
                    <select name="role" class="form-control">
                        <option value="admin">Aktif</option>
                        <option value="user">Non active</option>
                    </select>
                    @if($errors->has('role'))
                    <span class="help-block
                            @if($errors->has('role'))
                                has-error
                            @endif">
                        {{ $errors->first('role') }}
                    </span>
                    @endif
                </div>
                <div class="text-start">
                    <a href="/pages/user" class="btn btn-danger mt-3">Kembali</a>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
