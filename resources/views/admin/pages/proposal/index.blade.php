@extends('admin.layout.master')
@section('title', 'Proposal')
@section('content')
<div class="content-wrapper">
    <div class="container ">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">PROPOSAL /</span> Data Proposal</h4>

        <div class="card">
            <div class=" text-nowrap p-3">
                <div class=" alert-dismissible fade show" id="alert" role="alert">
                </div>
                <table class="table" id="table-proposal">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>deskripsi</th>
                            <th>file</th>
                            <th>tanggal</th>
                            <th>pengajuan</th>
                            <th>status</th>
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
@vite(['resources/js/pages/user/proposal_user.js'])
@endpush
