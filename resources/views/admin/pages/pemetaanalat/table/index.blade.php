@extends('admin.layout.master')
@section('title', 'Inventaris')
@section('content')
<div class="content-wrapper">
    <div class="container ">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">PEMETAAN /</span> Data pemetaan</h4>

        <div class="card">
            <div class=" text-nowrap p-3">
                <div class=" alert-dismissible fade show" id="alert" role="alert">
                </div>
                <table class="table" id="table-pemetaaanalat">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>judul report</th>
                            <th>kode alat</th>
                            <th>Nama alat</th>
                            <th>Status</th>
                            <th>tahun operasi</th>
                            <th>alamat</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/pages/admin/maps/table/index.js'])
@endsection

@push('styles')
{{-- set color paginate --}}
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: #fff !important;
        background: #264417 !important;
        border-color: #264417 !important;
    }

</style>
@endpush
