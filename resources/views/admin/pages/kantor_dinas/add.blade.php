@extends('admin.layout.master')
@section('title', 'Proposal')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Kantor Dinas /</span> Tambah Kantor</h4>
    <div class="card">
        <div class="container pe-3 ps-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="bio">Deskripsi</label>
                            <input type="text" name="bio" class="form-control" value="{{ old('bio') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{ old('alamat')}}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" name="kode_pos" class="form-control" value="{{ old('kode_pos') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="no_telp">No. Telp</label>
                            <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="website">Website</label>
                            <input type="text" name="website" class="form-control" value="{{ old('website') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="tanggal_jam_buka">Jam Buka</label>
                            <input type="time" name="tanggal_jam_buka" class="form-control" value="{{ old('tanggal_jam_buka') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="tanggal_jam_tutup">Jam Tutup</label>
                            <input type="time" name="tanggal_jam_tutup" class="form-control" value="{{ old('tanggal_jam_tutup') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="text-start">
                            <a href="/pages/kantor_dinas" class="btn btn-danger mt-3">Kembali</a>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/pages/admin/kantor_dinas/addData.js'])
@endsection
