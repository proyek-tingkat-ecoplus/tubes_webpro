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
                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control">
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
@vite(['resources/js/pages/admin/user/Editpass.js'])
@endsection
