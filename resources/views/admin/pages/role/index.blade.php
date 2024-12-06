@extends('admin.layout.master')
@section('title', 'Data Peran')
@section('content')
<div class="content-wrapper">
    <div class="container ">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Data Peran</h4>

        <div class="card">
            <div class=" text-nowrap p-3">
                <div class=" alert-dismissible fade show" id="alert" role="alert"></div>
                <table class="table" id="table-role">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama Role</th>
                            <th>Deskrispi Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/pages/admin/role/index.js'])
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
