@extends('main.main')
@section('content')
<!-- jQuery dan Bootstrap -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Profil Kepdes JS -->
<script src="{{ asset('asset/js/profil_kepdes.js') }}"></script>

<div class="container-fluid">
    <img src="{{asset('asset/image/pabrik.jpeg')}}" class="img-fluid img-hero" alt="Responsive image">
    <div class="card mx-auto card-style" style="z-index: 2">
        <div class="row">
            <!-- Kontak Information Section (Pindahkan ke kiri) -->
            <div class="col-md-4">
                <div class="social-media social-media-style">
                    <div class="container-fluid p-4 text-white">
                        <div class="fs-2 fw-bold">Kontak</div>
                        <div class="fs-text">
                            <div class="mt-2-text">EcoPulse</div>
                            <div class="p-3">Kompleks Tahura, Jl. Ir. H. Juanda No.99, Ciburial, Kec. Cimsnyan, Kabupaten Bandung, Jawa Barat 40198</div>
                            <div><i class="fa-solid fa-phone pe-2"></i>Telephone</div>
                            <div class="p-3">+22-3214458</div>
                            <div><i class="fa-solid fa-envelope pe-2"></i>Surel</div>
                            <div class="p-3">admin.Ecopulse@gmail.com</div>
                            <div><i class="fa-solid fa-globe pe-2"></i>Social Media</div>
                            <div class="ps-4 pt-3">
                                <div class="row">
                                    <div class="col-2"><i class="fa-brands fa-instagram"></i></div>
                                    <div class="col-2"><i class="fa-brands fa-facebook"></i></div>
                                    <div class="col-2"><i class="fa-brands fa-youtube"></i></div>
                                    <div class="col-2"><i class="fa-solid fa-x"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form and Map Section (Pindahkan form ke kanan dan di atas peta) -->
            <div class="col-md-8">
                <!-- Form Section -->
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
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone Number:</label>
                            <input type="number" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="message" class="form-label">Message:</label>
                            <textarea id="message" class="form-control" name="message" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-11">
                            <hr>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="telegram-btn" id="submitButton">
                                <i class="fa-brands fa-telegram me-2 btn-icon"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Google Maps Section -->
                <div class="ratio ratio-21x9 ratio-style mt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2883.4031134895417!2d10.396597!3d43.722952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d591a6c44e88cd%3A0x32eca9b1d554fc03!2sTower%20of%20Pisa!5e0!3m2!1sen!2sid!4v1729254277951!5m2!1sen!2sid"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{asset('asset/js/custom.js')}}"></script>

@endpush
