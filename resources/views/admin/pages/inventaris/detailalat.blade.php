@extends('admin.layout.master')
@section('title', 'Inventaris')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">INVENTARIS / Data Inventaris /</span> Detail Inventaris</h4>
    <div class="card">
        <div class="container pe-3 ps-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <form class="forms">
                        @method('put')
                        <div class="form-group mt-2">
                            <label for="avatar">Foto</label>
                            <div name="avatar"></div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="user">user</label>
                            <select name="user" class="form-control" disabled>

                            </select>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="nama_alat">nama</label>
                            <input type="text" name="nama_alat" class="form-control" value="{{ old('nama_alat') }}" disabled>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="jenis">Jenis</label>
                            <input type="text" name="jenis" class="form-control" value="{{ old('jenis') }}" disabled>
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group mt-2">
                            <label for="kondisi">Kondisi</label>
                            <select name="kondisi" class="form-control" disabled>
                                <option value="">Pilih Kondisi</option>
                                <option value="baru">baru</option>
                                <option value="bekas">bekas</option>
                            </select>
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group mt-2">
                            <label for="jumlah">Jumlah Barang</label>
                            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah') }}" disabled>
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group mt-2">
                            <label for="deskripsi_barang">Deskripsi</label>
                            <textarea name="deskripsi_barang" class="form-control" rows="3" disabled>{{ old('deskripsi_barang') }}</textarea>
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="text-start">
                            <a href="/pages/inventaris" class="btn btn-danger mt-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="text" hidden value="{{ $id }}" id="idx">
    <script>
        window.Laravel = {!! json_encode([
            'asset_url' => asset('')
        ]) !!};
    </script>
    @vite(['resources/js/pages/admin/inventaris/Detail.js'])>
@endsection
