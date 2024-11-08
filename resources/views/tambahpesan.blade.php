@extends('main.main')
@section('content')
<!-- jQuery dan Bootstrap -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Profil Kepdes JS -->
<script src="{{ asset('asset/js/profil_kepdes.js') }}"></script>

<div class="container-fluid">
    <img src="{{asset('asset/image/pabrik.jpeg')}}" class="img-fluid img-hero" alt="Responsive image">
    <div class="card mx-auto card-style">
        <div class="row">
            <div class="forum">
                <form action="" class="p-5" id="contactForm">
                    <div class="fs-3 fw-bold mb-3">Form Hubungi Kami</div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fname" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="fname" name="fname">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lname" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lname" name="lname">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="message" class="form-label">Message:</label>
                            <textarea id="message" class="form-control" name="message" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-1">
                            <button type="submit" class="telegram-btn" id="submitButton">
                                <i class="fa-brands fa-telegram me-2 btn-icon"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
