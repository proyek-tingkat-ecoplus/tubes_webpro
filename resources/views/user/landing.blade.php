@extends('user.master.master')

@section('content')

<!-- HERO SECTION -->
<section class="position-relative text-white" class="link-image" style="background: url('asset/image/pabrik.jpeg') no-repeat center center/cover; height: 600px;">
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center">
        <h1 class="display-4 fw-bold" style="text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);">Together We Can Make a Difference</h1>
        <p class="lead" style="text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);">Join us in bringing hope and help to children around the world.</p>
        <a href="https://www.youtube.com/watch?time_continue=42&v=r7dqPKj1NxI&embeds_referring_euri=https%3A%2F%2Fesdm.jabarprov.go.id%2F&source_ve_path=MTM5MTE3LDI4NjY0LDI4NjY0LDI4NjY0LDEzOTExNywyMzg1MQ"
        class="btn btn-light text-dark fw-semibold px-4 py-2 mt-3">Tonton Video</a>
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
<!-- Kontainer utama terpusat -->
<div class="container my-5">
    <div class="d-flex justify-content-center align-items-start">

      <!-- Gambar -->
      <div style="flex-shrink: 0;">
        <img src="asset/image/logo-admin.png" class="img-fluid rounded" alt="Informasi" style="max-width: 250px; height: auto;">
      </div>

      <!-- Teks Informasi -->
      <div class="ms-4" style="max-width: 700px;">
        <h1 class="fw-bold">Tentang Kami</h1>
        <p class="text-justify mb-2">
          Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Barat yang berlokasi di <br>
          Jalan Soekarno-Hatta Nomor 576 Bandung, pertama kali dibentuk pada tahun 1978<br>
          berdasarkan Peraturan Daerah Provinsi Jawa Barat Nomor 4/DP/040/DP/1978<br>
          dengan nama Dinas Pertambangan Daerah Provinsi Jawa Barat. Berdasarkan Peraturan<br>
          Gubernur Nomor 65 Tahun 2017, Dinas ESDM Provinsi Jawa Barat mempunyai tugas pokok<br>
          melaksanakan urusan pemerintahan bidang energi dan sumber daya mineral, meliputi <b>energi,<br>
          ketenagalistrikan, pertambangan serta air tanah</b> yang menjadi kewenangan Provinsi.
        </p>
        <a href="http://127.0.0.1:8000/profile" class="text-primary fw-semibold text-decoration-none d-inline-flex align-items-center">
          Selengkapnya
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right ms-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.293 1.5a.5.5 0 0 1 .707 0l4.5 4.5a.5.5 0 0 1 0 .707l-4.5 4.5a.5.5 0 0 1-.707-.707L13.793 7.5H1.5a.5.5 0 0 1 0-1h12.293L10.293 2.207a.5.5 0 0 1 0-.707z"/>
          </svg>
        </a>
      </div>

    </div>
  </div>




{{-- <!-- SPACER SECTION BAWAH -->
<section style="height: 120px;"></section> --}}

<!-- Contact Section -->
<div class="py-5" id="kontak">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Kontak Kami</h2>

        <div class="row g-4 align-items-stretch">

            <!-- Google Maps -->
            <div class="col-md-6">
                <div class="ratio ratio-4x3 h-100">
                    <iframe class="rounded-4"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13624.303093780829!2d107.64967217886876!3d-6.94350527415583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8172d074f1f%3A0xf309f9b68cb6a7f8!2sDinas%20Energi%20dan%20Sumber%20Daya%20Mineral%20Prov.%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1746086333996!5m2!1sid!2sid"
                        allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Kontak Info -->
            <div class="col-md-6">
                <div class="row g-4">
                    <!-- Alamat -->
                    <div class="col-12">
                        <div class="card h-100 border-0 shadow rounded-4 text-center bg-white">
                            <div class="card-body d-flex flex-column">
                                <div class="mb-3">
                                    <i class="fas fa-map-marker-alt fa-2x text-dark"></i>
                                </div>
                                <h5 class="card-title fw-bold text-dark">Alamat</h5>
                                <p class="card-text fw-semibold text-dark">
                                    Jl. Soekarno-Hatta No.576, Sekejati, Kec. Buahbatu, Kota Bandung
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak -->
                    <div class="col-6">
                        <div class="card h-100 border-0 shadow rounded-4 text-center bg-white">
                            <div class="card-body d-flex flex-column">
                                <div class="mb-3">
                                    <i class="fas fa-phone-alt fa-2x text-dark"></i>
                                </div>
                                <h5 class="card-title fw-bold text-dark">Kontak</h5>
                                <p class="card-text fw-semibold text-dark">+22-3214458</p>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-6">
                        <div class="card h-100 border-0 shadow rounded-4 text-center bg-white">
                            <div class="card-body d-flex flex-column">
                                <div class="mb-3">
                                    <i class="fas fa-envelope fa-2x text-dark"></i>
                                </div>
                                <h5 class="card-title fw-bold text-dark">Email</h5>
                                <p class="card-text fw-semibold text-dark">admin.Ecopulse@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Instagram -->
                    <div class="col-6">
                        <div class="card h-100 border-0 shadow rounded-4 text-center bg-white">
                            <div class="card-body d-flex flex-column">
                                <div class="mb-3">
                                    <i class="fab fa-instagram fa-2x text-dark" style="font-size:36px"></i>
                                </div>
                                <h5 class="card-title fw-bold text-dark">Instagram</h5>
                                <p class="card-text fw-semibold text-dark">@cabdin4bdg_desdm</p>
                            </div>
                        </div>
                    </div>

                    <!-- Youtube -->
                    <div class="col-6">
                        <div class="card h-100 border-0 shadow rounded-4 text-center bg-white">
                            <div class="card-body d-flex flex-column">
                                <div class="mb-3">
                                    <i class="fab fa-youtube fa-2x text-dark"></i>
                                </div>
                                <h5 class="card-title fw-bold text-dark">Youtube</h5>
                                <p class="card-text fw-semibold text-dark">Dinas ESDM Provinsi Jabar</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection
