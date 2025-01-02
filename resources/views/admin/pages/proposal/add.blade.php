@extends('admin.layout.master')
@section('title', 'Proposal')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">PRPOSAL / Data Proposal /</span> Tambah Proposal</h4>
    <div class="card">
        <div class="container pe-3 ps-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="title">Name</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="attachment">File</label>
                            <input type="file" name="attachment" class="form-control">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="start_date">Start Data</label>
                            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="text-start">
                            <a href="/pages/proposal" class="btn btn-danger mt-3">Kembali</a>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/pages/user/proposal_user.js'])
@endsection
