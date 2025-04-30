@extends('user.master.master')

@section('content')

<!-- HERO SECTION -->
<section class="position-relative text-white" class="link-image" style="background: url('asset/image/pabrik.jpeg') no-repeat center center/cover; height: 600px;">
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center">
        <h1 class="display-4 fw-bold" style="text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);">Together We Can Make a Difference</h1>
        <p class="lead" style="text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);">Join us in bringing hope and help to children around the world.</p>
        <a href="https://www.youtube.com/watch?time_continue=42&v=r7dqPKj1NxI&embeds_referring_euri=https%3A%2F%2Fesdm.jabarprov.go.id%2F&source_ve_path=MTM5MTE3LDI4NjY0LDI4NjY0LDI4NjY0LDEzOTExNywyMzg1MQ"
        class="btn btn-light text-dark fw-semibold px-4 py-2 mt-3">Watch Video</a>
    </div>

    <!-- FEATURE SECTION OVERLAPPED -->
<div class="container position-absolute start-50 translate-middle-x" style="bottom: -60px; z-index: 10;">
    <div class="row bg-white shadow-lg py-4 px-3 text-center" style="border-radius: 1.5rem;">
        <!-- 24 HOURS -->
        <div class="col-md-4 d-flex flex-column align-items-center">
            <img src="{{asset('asset/image/proposal.png')}}" alt="24 Hours" class="mb-2" />
            <h6 class="fw-bold text-dark">Pengiriman Proposal</h6>
            <p class="text-muted small">Kepala desa dapat mengajukan proposal permohonan pembangunan.<br />
        </div>

        <!-- HIGH-RES -->
        <div class="col-md-4 d-flex flex-column align-items-center">
            <img src="{{asset('asset/image/forum.png')}}" alt="High-Res" class="mb-2" />
            <h6 class="fw-bold text-dark">Forum</h6>
            <p class="text-muted small">Bergabunglah dalam forum kami dan diskusikan seputar lingkungan hidup.<br />
        </div>

        <!-- SECURITY -->
        <div class="col-md-4 d-flex flex-column align-items-center">
            <img src="{{asset('asset/image/map.png')}}" alt="Security" class="mb-2" />
            <h6 class="fw-bold text-dark">Pemetaan Infrastruktur</h6>
            <p class="text-muted small">Pemetaan infrastruktur untuk energi terbarukan dan peninjauan alat.<br />
        </div>
    </div>
</div>

    </div>
</section>

<!-- SPACER SECTION BAWAH -->
<section style="height: 120px;"></section>


{{-- <!-- Feature Section -->
<div id="feature" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Fitur Kami</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card border-0 shadow h-100 text-center">
                    <img src="{{ asset('image/inventaris/default.png') }}" class="card-img-top p-4" alt="Pengiriman Proposal">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Pengiriman Proposal</h5>
                        <p class="card-text text-muted">Kepala desa dapat mengajukan proposal permohonan pembangunan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow h-100 text-center">
                    <img src="{{ asset('image/inventaris/default.png') }}" class="card-img-top p-4" alt="Forum">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Forum</h5>
                        <p class="card-text text-muted">Bergabunglah dalam forum kami dan diskusikan seputar lingkungan hidup.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow h-100 text-center">
                    <img src="{{ asset('image/inventaris/default.png') }}" class="card-img-top p-4" alt="Pemetaan Infrastruktur">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Pemetaan Infrastruktur</h5>
                        <p class="card-text text-muted">Pemetaan infrastruktur untuk energi terbarukan dan peninjauan alat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Contact Section -->
<div class="py-5 bg-white" id="kontak">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Kontak Kami</h2>
        <div class="row g-4 justify-content-center">
            <!-- Alamat -->
            <div class="col-md-4">
                <div class="card border-0 text-center" style="background-color: #003030">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-map-marker-alt fa-2x text-white"></i>
                        </div>
                        <h5 class="card-title fw-bold text-white">Alamat</h5>
                        <p class="card-text fw-semibold text-white">Jl. Raya Bandung No. 1, Bandung, Jawa Barat</p>
                        <a href="#" class="btn border-white text-white">
                            Lihat di Maps
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kontak -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center" style="background-color: #003030">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-phone-alt fa-2x text-white"></i>
                        </div>
                        <h5 class="card-title fw-bold text-white">Kontak</h5>
                        <p class="card-text fw-semibold text-white">+22-3214458</p>
                        <a href="tel:+223214458" class="btn border-white text-white">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center" style="background-color: #003030">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-envelope fa-2x text-white"></i>
                        </div>
                        <h5 class="card-title fw-bold text-white">Email</h5>
                        <p class="card-text fw-semibold text-white">admin.Ecopulse@gmail.com</p>
                        <a href="mailto:admin.Ecopulse@gmail.com" class="btn border-white text-white">
                            Kirim Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
