@extends('admin.layout.master')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Data Pengguna /</span> Edit Pengguna</h4>
<div class="card">
    <div class="container pe-3 ps-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <form class="form">
                    @method('put')
                    <div class="form-group mt-2"></div>
                    <div class="form-group mt-2 ">
                        <label for="name">Username</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2 ">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }} ">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2 ">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }} ">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2 ">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{ old('nik') }} ">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2 ">
                        <label for="address">Alamat</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }} ">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2 ">
                        <label for="phone">No. Handphone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }} ">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2 ">
                        <label for="city">Kabupaten</label>
                        <input type="text" name="city" class="form-control" value="{{ old('city') }} ">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2 ">
                        <label for="state">Provinsi</label>
                        <input type="text" name="state" class="form-control" value="{{ old('state') }} ">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2 ">
                        <label for="country">Negara</label>
                        <input type="text" name="country" class="form-control" value="{{ old('country') }} ">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="foto">Foto</label>
                        <input type="file" name="avatar" class="form-control" accept="image/*" >
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="role">Peran</label>
                        <select name="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="admin">Aktif</option>
                            <option value="user">Non active</option>
                        </select>
                        <span class="invalid-feedback"></span>
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
<input type="text" hidden value="{{ $id }}" id="idx">
@vite(['resources/js/pages/admin/user/EditData.js'])
@endsection
