@extends('user.master.master')
@section('content')

<body style="background-color:white">
<!-- Section header + konten gabung -->
<div class="section-230 position-relative">

 <!-- Header Profil -->
<div class="d-flex align-items-center" style="background: url('asset/image/pabrik.jpeg') center center/cover no-repeat; height: 600px; background-color: rgba(0,0,0,0.6); background-blend-mode: darken;">
    <div class="container" style="padding-top: 200px;">
        <h1 class="text-white fw-bold" style="font-size: 3rem;">Profil Dinas ESDM</h1>
        <p class="text-white" style="font-size: 1.25rem;">Berikut Profil Dinas ESDM Provinsi Jawa Barat</p>
    </div>
</div>

    <!-- Informasi Card -->
    <div class="container">
        <div class="card shadow p-4" style="margin-top: -100px; border-radius: 15px;">
            <div class="row g-4">

                <!-- Gambar -->
            <div class="col-md-4 d-flex align-items-start justify-content-center">
                <img src="asset/image/logo-admin.png" class="img-fluid rounded" alt="Informasi" style="max-width: 250px; height: auto;">
            </div>
                <!-- Teks Informasi -->
                <div class="col-md-8">
                    <h4 class="fw-bold mb-3">PROFIL DINAS ESDM PROVINSI JAWA BARAT</h4>
                    <p class="text-justify">
                        Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Barat yang berlokasi di Jalan Soekarno-Hatta Nomor 576 Bandung,
                        pertama kali dibentuk pada tahun 1978 berdasarkan Peraturan Daerah Provinsi Jawa Barat Nomor 4/DP/040/DP/1978
                        dengan nama Dinas Pertambangan Daerah Provinsi Jawa Barat. Saat ini, berdasarkan Peraturan Gubernur Nomor 65 Tahun 2017,
                        Dinas ESDM Provinsi Jawa Barat mempunyai tugas pokok melaksanakan urusan pemerintahan bidang energi dan sumber daya mineral,
                        meliputi <b>energi, ketenagalistrikan, pertambangan serta air tanah</b> yang menjadi kewenangan Provinsi...
                    </p>
                 </div>

            </div>
            <!-- Tugas Pokok -->
            <h5 class="fw-bold mb-3">TUGAS POKOK</h5>
            <p class="text-justify mb-5">
                Dinas Energi dan Sumber Daya Mineral mempunyai tugas pokok membantu Gubernur melaksanakan urusan pemerintahan bidang energi
                dan sumber daya mineral yang menjadi kewenangan Daerah dan Tugas Pembantuan yang ditugaskan kepada Daerah.
            </p>

            <!-- Fungsi -->
            <h5 class="fw-bold mb-3">FUNGSI</h5>
            <ul class="mb-5">
                <li>Penyusunan kebijakan bidang geologi dan air tanah, mineral dan batubara, ketenagalistrikan, energi baru terbarukan.</li>
                <li>Pelaksanaan kebijakan bidang geologi dan air tanah, mineral dan batubara, ketenagalistrikan, energi baru terbarukan.</li>
                <li>Pelaksanaan evaluasi dan pelaporan bidang geologi dan air tanah, mineral dan batubara, ketenagalistrikan, energi baru terbarukan.</li>
                <li>Pelaksanaan pembinaan administrasi kepada seluruh unit kerja di lingkungan Dinas.</li>
                <li>Pelaksanaan fungsi kedinasan lain yang diberikan oleh Gubernur sesuai tugas dan fungsinya.</li>
            </ul>

            <!-- Dasar Hukum -->
            <h5 class="fw-bold mb-3">DASAR HUKUM</h5>
            <ul class="mb-5">
                <li>Undang-Undang Nomor 23 Tahun 2014 tentang Pemerintahan Daerah</li>
                <li>Peraturan Pemerintah Nomor 18 Tahun 2016 tentang Perangkat Daerah</li>
                <li>Peraturan Daerah Provinsi Jawa Barat Nomor 6 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Provinsi Jawa Barat</li>
                <li>Peraturan Gubernur Jawa Barat Nomor 65 Tahun 2017 tentang Tugas Pokok, Fungsi, Rincian Tugas Unit dan Tata Kerja Dinas Energi dan Sumber Daya Mineral Provinsi Jawa Barat</li>
                <li>Dan regulasi terkait lainnya.</li>
            </ul>

            <!-- (Lanjutkan bagian Fungsi, Dasar Hukum, Visi Misi seperti biasa...) -->

        </div>
    </div>

    <!-- Section Carousel Pejabat -->
<div class="container mt-5">
    <h4 class="fw-bold mb-4 text-center">Struktur Organisasi</h4>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            <!-- Card 1 -->
            <div class="swiper-slide">
                <div class="card text-center shadow" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-body">
                        <img src="asset/image/orang.png" class="rounded-circle mb-3" alt="Foto 1" style="width: 120px; height: 120px; object-fit: cover;">
                        <h5 class="fw-bold">Dr. Rendy Nugraha, S.T., M.T., Ph.D.</h5>
                        <p>Kepala Dinas<br>Energi Bersih Terbaharukan</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="swiper-slide">
                <div class="card text-center shadow" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-body">
                        <img src="asset/image/orang.png" class="rounded-circle mb-3" alt="Foto 2" style="width: 120px; height: 120px; object-fit: cover;">
                        <h5 class="fw-bold">Dr. Ratna Kusuma, S.T., M.T., Ph.D.</h5>
                        <p>Wakil Kepala Dinas<br>Energi Bersih Terbaharukan</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="swiper-slide">
                <div class="card text-center shadow" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-body">
                        <img src="asset/image/orang.png" class="rounded-circle mb-3" alt="Foto 3" style="width: 120px; height: 120px; object-fit: cover;">
                        <h5 class="fw-bold">Dr. Arif Pratama, S.T., M.T., Ph.D.</h5>
                        <p>Sekretaris Dinas<br>Energi Bersih Terbaharukan</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="swiper-slide">
                <div class="card text-center shadow" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-body">
                        <img src="asset/image/orang.png" class="rounded-circle mb-3" alt="Foto 4" style="width: 120px; height: 120px; object-fit: cover;">
                        <h5 class="fw-bold">Dr. Diandra, S.T., M.T., Ph.D.</h5>
                        <p>Bendahara Dinas<br>Energi Bersih Terbaharukan</p>
                    </div>
                </div>
            </div>

        </div>
        <!-- Navigasi -->
        <div class="swiper-pagination"></div>
    </div>
</div>
</body>
<!-- SPACER SECTION BAWAH -->
<section style="height: 120px;"></section>
</div>
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            }
        }
    });
</script>

<style>
    .text-justify {
        text-align: justify;
    }
    .fw-bold {
        font-weight: bold;
    }
</style>

@endsection
