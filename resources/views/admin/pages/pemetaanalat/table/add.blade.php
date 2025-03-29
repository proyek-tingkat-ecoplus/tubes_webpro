@extends('admin.layout.master')
@section('title', 'Pemetaan')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Data Pemetaan /</span> Tambah Pemetaan</h4>
<div class="card">
    <div class="container pe-3 ps-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" class="form-pemetaan" id="addLocationForm">
                    @csrf


                    {{--  select user --}}
                    <div class="mb-3">
                        <label for="user"  class="form-label">User</label>
                        <select name="user"  class="form-select" id="locations-user" >
                        </select>
                        <span class="invalid-feedback"></span>
                    </div>
                    <!-- Select alat -->
                    <div class="mb-3">
                        <label for="location-alat" class="form-label">Alat</label>
                        <select class="form-select" id="location-alat" name="alat_id">
                        </select>
                        <span class="invalid-feedback"></span>
                    </div>
                    <!-- Location Name -->
                    <div class="mb-3">
                        <label for="judul-report" class="form-label">Judul report</label>
                        <input type="text" class="form-control" id="judul-report" name="judul_report" >
                        <span class="invalid-feedback"></span>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="location-description" class="form-label">Description</label>
                        <textarea class="form-control" id="location-description" rows="3" name="deskripsi"></textarea>
                        <span class="invalid-feedback"></span>
                    </div>

                    <!-- Binwas -->
                    <div class="mb-3">
                        <label for="location-binwas" class="form-label">Binwas</label>
                        <input type="text" class="form-control" id="location-binwas" name="binwas" >
                        <span class="invalid-feedback"></span>
                    </div>

                    <!-- Year of Operation -->
                    <div class="mb-3">
                        <label for="location-tahun_operasi" class="form-label">Year of Operation</label>
                        <input type="number" class="form-control" id="location-tahun_operasi" name="tahun_operasi" >
                        <span class="invalid-feedback"></span>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                            <label for="location-address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="location-address"  name="address" >
                            <span class="invalid-feedback"></span>
                    </div>


                    <!-- Latitude -->
                    <div class="mb-3">
                        <label for="location-lat" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="location-lat"  readonly>
                    </div>

                    <!-- Longitude -->
                    <div class="mb-3">
                        <label for="location-lng" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="location-lng"  readonly>
                    </div>


                    <!-- Photo -->
                    <div class="mb-3">
                        <label for="location-photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="location-photo" accept="image/*" name="photo">
                        <span class="invalid-feedback"></span>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="location-status" class="form-label">Status</label>
                        <select class="form-select" id="location-status" name="status" >
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="text-start">
                        <a href="/pages/pemetaanalat/marker" class="btn btn-danger mt-3">Kembali</a>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/pages/admin/maps/table/addData.js'])
@endsection
