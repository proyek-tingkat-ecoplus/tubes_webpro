@extends('admin.layout.master')
@section('title', 'Kantor Dinas')
@section('content')
<div class="content-wrapper">
    <div class="container ">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Kantor Dinas</h4>

        <div class="card">
            <div class=" text-nowrap p-3">
                <div class=" alert-dismissible fade show" id="alert" role="alert"></div>
                <table class="table" id="table-role">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Alamat</th>
                            <th>Kode Pos</th>
                            <th>No. Telp</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Jam Buka</th>
                            <th>Jam Tutup</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/pages/admin/kantor_dinas/index.js'])
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
