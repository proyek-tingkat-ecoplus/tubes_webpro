@extends('admin.layout.master')
@section('title', 'Pemetaan Alat')
@push('styles')
    <style>
        .select2-container--bootstrap-5 .select2-selection--single {
            border: 1px solid #ced4da !important; /* Bootstrap's default border color */
            border-radius: 0.375rem; /* Match Bootstrap's border-radius */
            height: calc(2.25rem + 2px); /* Match Bootstrap's input height */
            padding-top:8px;
            padding: 8px 0px 2rem 15px;
        }
        .select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered {
            line-height: 1.5; /* Align text vertically */
        }
        .select2-container--bootstrap-5 .select2-selection--single .select2-selection__arrow {
            height: calc(2.25rem + 2px); /* Align arrow with input height */
        }
        .select2-container--bootstrap-5 .select2-results__option {
            padding: 8px 15px; /* Add padding to options */
            background-color: #f0f0f0 !important; /* Light gray background */
        }
        /* Highlighted/selected option */
        .select2-container--bootstrap-5 .select2-results__option--highlighted {
            background-color: #004d40 !important; /* Bootstrap primary color for highlight */
            color: #fff !important; /* White text for contrast */
        }
    </style>
@endpush
@section('content')
<div class="content-wrapper">

    <div class="container">
    <div class="card">
            <div class="row m-2">
            <div class="col-md-3">
                <label for="" class="form-label">Pencarian lokasi :</label>
                <input type="text" id="location-input" class="form-control" placeholder="Search location...">
            </div>
            <div class="col-md-3">
                <label for="" class="form-label">Kode alat :</label>
                <select name="nama_alat" class="form-control select2  select_kode_alat" id="" >

                </select>
            </div>
            <div class="col-md-3">
                <label for="" class="form-label">tahun :</label>

                <select name="tahun_alat" class="form-control select2 select_tahun_operasi" id="">
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>
            </div>
            <div class="col-md-3 mt-md-0">
                <button class="btn btn-primary mt-md-4 mt-2" id="search">Search</button>
                <button class="btn btn-primary mt-md-4 mt-2" id="clear">Reset</button>
            </div>
        </div>
    </div>
        <div class="card mt-2">
            <div id="googleMap" class="m-2" style="width:98%; height:380px;posision:relative;"></div>
        </div>
    </div>
</div>

<!-- Modal for adding or editing location -->
<<div class="modal fade" id="addLocationModal" tabindex="-1" aria-labelledby="addLocationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Ubah ke modal-lg untuk ruang lebih -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLocationModalLabel">Add / Edit Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="id" hidden>

                <form id="addLocationForm">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <!-- Select Alat -->
                            <div class="mb-3">
                                <label for="location-alat" class="form-label">Alat</label>
                                <select class="form-select" id="location-alat" name="alat_id">
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>

                            <!-- Judul Report -->
                            <div class="mb-3">
                                <label for="judul-report" class="form-label">Judul Report</label>
                                <input type="text" class="form-control" id="judul-report" name="judul_report">
                                <span class="invalid-feedback"></span>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="location-description" class="form-label">Description</label>
                                <textarea class="form-control" id="location-description" rows="4" name="deskripsi"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>

                            <!-- Binwas -->
                            <div class="mb-3">
                                <label for="location-binwas" class="form-label">Binwas</label>
                                <input type="text" class="form-control" id="location-binwas" name="binwas">
                                <span class="invalid-feedback"></span>
                            </div>

                            <!-- Year of Operation -->
                            <div class="mb-3">
                                <label for="location-tahun_operasi" class="form-label">Year of Operation</label>
                                <input type="number" class="form-control" id="location-tahun_operasi" name="tahun_operasi">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <!-- Koordinat (Latitude & Longitude) -->
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="location-lat" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" id="location-lat" readonly>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="location-lng" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" id="location-lng" readonly>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label for="location-address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="location-address" name="address" readonly>
                                <span class="invalid-feedback"></span>
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
                                <select class="form-select" id="location-status" name="status">
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="mt-3 text-end">
                        <button type="submit" class="btn btn-primary">Save Location</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="markerModal" tabindex="-1" aria-labelledby="markerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="markerModalLabel">Detail Laporan Alat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 " id="image">
                            {{-- <img id="" src="" alt="Report Photo" class="img-fluid rounded"> --}}
                        </div>
                        <div class="mb-3">
                            <h5 id="modal-judul-report" class="text-primary"></h5>
                        </div>
                        <div class="mb-3">
                            <strong>Deskripsi:</strong>
                            <p id="modal-deskripsi"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <strong>Detail Alat:</strong>
                            <p class="mb-1">Kode: <span id="modal-kode-alat"></span></p>
                            <p class="mb-1">Nama: <span id="modal-nama-alat"></span></p>
                            <p class="mb-1">Jenis: <span id="modal-jenis-alat"></span></p>
                        </div>
                        <div class="mb-2">
                            <strong>Informasi Laporan:</strong>
                            <p class="mb-1">Binwas: <span id="modal-binwas"></span></p>
                            <p class="mb-1">Tahun Operasi: <span id="modal-tahun-operasi"></span></p>
                            <p class="mb-1">Tanggal: <span id="modal-tanggal"></span></p>
                            <p class="mb-1">Status: <span id="modal-status" class="badge bg-primary"></span></p>
                        </div>
                        <div class="mb-2">
                            <strong>Lokasi:</strong>
                            <p class="mb-1">Latitude: <span id="modal-location-lat"></span></p>
                            <p class="mb-1">Longitude: <span id="modal-location-lng"></span></p>
                            <p class="mb-1">Alamat: <span id="modal-location-address"></span></p>
                        </div>
                        <div id="approval-info" class="mb-2 d-none">
                            <strong>Informasi Persetujuan:</strong>
                            <p class="mb-1">Disetujui oleh: <span id="modal-approved-by"></span></p>
                            <p class="mb-1">Tanggal persetujuan: <span id="modal-approved-at"></span></p>
                            {{-- <p class="mb-1">Alasan: <span id="modal-approved-reason"></span></p> --}}
                        </div>
                        <div id="rejection-info" class="mb-2 d-none">
                            <strong>Informasi Penolakan:</strong>
                            <p class="mb-1">Ditolak oleh: <span id="modal-rejected-by"></span></p>
                            <p class="mb-1">Tanggal penolakan: <span id="modal-rejected-at"></span></p>
                            {{-- <p class="mb-1">Alasan: <span id="modal-rejected-reason"></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="editMarkerBtn">Edit</button>
                <button type="button" class="btn btn-danger" id="deleteMarkerBtn">Delete</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- <script src="https://maps.gomaps.pro/maps/api/js?key=AlzaSyppXnhCOMVxkzPe4k6sJ4rmYn7uApemyJu&libraries=places,geometry&callback=initialize&language=id&region=ID"></script> --}}

@endsection

@push('styles')
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: #fff !important;
        background: #264417 !important;
        border-color: #264417 !important;
    }
</style>
@vite('resources/js/pages/admin/maps/index.js')
@endpush
