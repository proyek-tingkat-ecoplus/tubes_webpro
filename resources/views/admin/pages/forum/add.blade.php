@extends('admin.layout.master')
@section('title', 'Forum')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">FORMULIR / Data Forum /</span> Tambah Forum</h4>
    <div class="card">
        <div class="container pe-3 ps-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST" class="form">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="user">Author</label>
                            <select name="user" class="form-control" >
                            </select>
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group mt-2">
                            <label for="name">name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group mt-2">
                            <label for="description">description</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="text-start">
                            <a href="/pages/forum" class="btn btn-danger mt-3">Kembali</a>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@vite('resources/js/pages/admin/forum/AddData.js')
@endsection
