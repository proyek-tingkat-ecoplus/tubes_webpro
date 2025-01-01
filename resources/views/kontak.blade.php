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
            <!-- Form Section (Kiri) -->
            <div class="col-md-8">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Section -->
                <form action="mailto:admin.Ecopulse@gmail.com" method="post" enctype="text/plain" class="p-5" id="contactForm">
                    <div class="fs-3 fw-bold mb-3">Form Hubungi Kami</div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fname" class="form-label">First Name:</label>
                            <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ old('fname') }}">
                            @error('fname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="lname" class="form-label">Last Name:</label>
                            <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{ old('lname') }}">
                            @error('lname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone Number:</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $error }}</div>
                            @enderror
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
            </div>

            <!-- Kontak dan Maps Section (Kanan) -->
            <div class="col-md-4">
                <!-- Kontak -->
                <div class="social-media social-media-style mb-3">
                    <div class="container-fluid p-4 text-white">
                        <div class="fs-2 fw-bold">Kontak</div>
                        <div class="fs-text">
                            <div class="mt-2-text">EcoPulse</div>
                            <div class="p-3">Kompleks Tahura, Jl. Ir. H. Juanda No.99, Ciburial, Kec. Cimenyan, Kabupaten Bandung, Jawa Barat 40198</div>

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

                <!-- Google Maps -->
                <div class="ratio ratio-21x9 ratio-style">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2883.4031134895417!2d10.396597!3d43.722952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d591a6c44e88cd%3A0x32eca9b1d554fc03!2sTower%20of%20Pisa!5e0!3m2!1sen!2sid!4v1729254277951!5m2!1sen!2sid"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- js --}}
                <script>
                    document.querySelector('#contactForm').addEventListener('submit', function(event) {
                        const fname = document.getElementById('fname');
                        const lname = document.getElementById('lname');
                        const phone = document.getElementById('phone');
                        const regex = /\d/; // Regex untuk mendeteksi angka
                        const regexPhone = /^[0-9]+$/; // Regex untuk hanya angka

                        let isValid = true;

                        // Validasi First Name
                        if (regex.test(fname.value)) {
                            isValid = false;
                            fname.classList.add('is-invalid');
                            if (!fname.nextElementSibling || !fname.nextElementSibling.classList.contains('invalid-feedback')) {
                                const error = document.createElement('div');
                                error.className = 'invalid-feedback';
                                error.textContent = 'tidak boleh mengandung angka.';
                                fname.parentNode.appendChild(error);
                            }
                        } else {
                            fname.classList.remove('is-invalid');
                            if (fname.nextElementSibling && fname.nextElementSibling.classList.contains('invalid-feedback')) {
                                fname.nextElementSibling.remove();
                            }
                        }

                        // Validasi Last Name
                        if (regex.test(lname.value)) {
                            isValid = false;
                            lname.classList.add('is-invalid');
                            if (!lname.nextElementSibling || !lname.nextElementSibling.classList.contains('invalid-feedback')) {
                                const error = document.createElement('div');
                                error.className = 'invalid-feedback';
                                error.textContent = 'tidak boleh mengandung angka.';
                                lname.parentNode.appendChild(error);
                            }
                        } else {
                            lname.classList.remove('is-invalid');
                            if (lname.nextElementSibling && lname.nextElementSibling.classList.contains('invalid-feedback')) {
                                lname.nextElementSibling.remove();
                            }
                        }

                         // Validasi Phone Number
                        if (!regexPhone.test(phone.value)) {
                            isValid = false;
                            phone.classList.add('is-invalid');
                            if (!phone.nextElementSibling || !phone.nextElementSibling.classList.contains('invalid-feedback')) {
                                const error = document.createElement('div');
                                error.className = 'invalid-feedback';
                                error.textContent = 'hanya boleh berisi angka.';
                                phone.parentNode.appendChild(error);
                            }
                        } else {
                            phone.classList.remove('is-invalid');
                            if (phone.nextElementSibling && phone.nextElementSibling.classList.contains('invalid-feedback')) {
                                phone.nextElementSibling.remove();
                            }
                        }
                        // Jika tidak valid, hentikan pengiriman form
                        if (!isValid) {
                            event.preventDefault();
                        }
                    });
                </script>

@endsection

@push('scripts')
<script src="{{asset('asset/js/custom.js')}}"></script>
@endpush
