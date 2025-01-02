@extends('main.main')
@section('content')
<!-- jQuery dan Bootstrap -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Profil Kepdes JS -->
<script src="{{ asset('asset/js/client/profil_kepdes.js') }}"></script>

<div class="container-fluid">
    <img src="{{asset('asset/image/pabrik.jpeg')}}" class="img-fluid img-hero" alt="Responsive image">
    <div class="card mx-auto card-style">
        <div class="row">
            <div class="forum" style="z-index: 2">
                <!-- Form untuk menambahkan forum baru -->
                <form action="{{ route('forums.store') }}" method="POST" class="p-5">
                    @csrf <!-- Laravel CSRF token -->
                    <div class="fs-3 fw-bold mb-3">Tambah Forum Baru</div>
                    <div class="row" style="z-index: 2">
                        <div class="form-group col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-1">
                            <button type="submit" class="telegram-btn" id="submitButton">
                                <i class="fa-brands fa-telegram me-2 btn-icon"></i>
                            </button>
                            <a class="btn search-bar" type="button" id="button-addon2" href="/fr">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
