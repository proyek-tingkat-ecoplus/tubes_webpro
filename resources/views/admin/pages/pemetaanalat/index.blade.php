@extends('admin.layout.master')
@section('title', 'Pemetaan Alat')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="card mt-4">
            <div class="row mt-2 ms-2">
                <div class="col-md-7">
                    <h4>Pemetaan Alat</h4>
                </div>
                <div class="col-md-3">
                    <input type="text" id="location-input" class="form-control" placeholder="Search location...">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" id="searchBtn">Search</button>
                </div>
            </div>
            <div id="googleMap" class="mt-2" style="width:100%; height:380px;"></div>
        </div>
    </div>
</div>

<!-- Modal for adding or editing location -->
<div class="modal fade" id="addLocationModal" tabindex="-1" aria-labelledby="addLocationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLocationModalLabel">Add / Edit Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="id" hidden>

                <form id="addLocationForm">
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

                    <button type="submit" class="btn btn-primary">Save Location</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for displaying location details -->
<div class="modal fade" id="markerModal" tabindex="-1" aria-labelledby="markerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="markerModalLabel">Location Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 id="modal-judul-report"></h3>
                <div id="image">

                </div>
                <p id="modal-location-description"></p>
                <p><strong>Latitude:</strong> <span id="modal-location-lat"></span></p>
                <p><strong>Longitude:</strong> <span id="modal-location-lng"></span></p>
                <p><strong>Address:</strong> <span id="modal-location-address"></span></p>
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
@vite('resources/js/pages/admin/map/index')
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
@endpush
