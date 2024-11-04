@extends('main.main')
@section('content')
@push ('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/pages/kontakCards.css')}}">
@endpush
<section class="hero-section">
    <img src="{{asset('asset/image/pabrik.jpeg')}}" class="img-fluid img-hero" alt="Responsive image">
</section>


<body>
<!-- Hero Section -->
<section id="hero-section" class="hero-section">
  <div class="container my-5 text-success-emphasis">
    <div class="bg-success text-white text-center py-4">
      <h6 class="text-uppercase">Misi dari EcoPulse</h6>
      <h5 class="font-weight-bold">Menyediakan solusi energi terbarukan yang inovatif untuk mendukung keberlanjutan dan mengurangi dampak negatif terhadap lingkungan</h5>
    </div>
    <div class="bg-dark text-white text-center py-2">
      <p class="mb-0">Meningkatkan akses energi bersih bagi masyarakat, industri, dan pemerintah</p>
    </div>
  </div>
  </section>

  <section id="tasks-section" class="section-padding bg-light">
  <div class="container my-5">
    <div class="row">
      <!-- Text Column -->
      <div class="col-md-6">
        <h2 class="font-weight-bold">Tugas Pokok dan Fungsi</h2>

        <!-- Tugas Section -->
        <h5 class="mt-4 font-weight-bold">TUGAS</h5>
        <p>EcoPulse memiliki tugas utama untuk mengembangkan, memproduksi, dan menyediakan solusi energi bersih terbarukan dengan fokus pada teknologi yang ramah lingkungan dan berkelanjutan. Beberapa tugas pokok yang dapat diuraikan sebagai berikut:</p>
        <ul>
          <li>Mengembangkan sumber energi terbarukan seperti tenaga surya, angin, dan biomassa.</li>
          <li>Merancang dan memasang infrastruktur energi bersih seperti panel surya dan turbin angin.</li>
          <li>Memberikan solusi energi kepada sektor industri, komersial, dan pemerintah.</li>
          <li>Menyediakan layanan konsultasi terkait kebijakan energi terbarukan dan pengelolaan emisi karbon.</li>
        </ul>

        <!-- Fungsi Section -->
        <h5 class="mt-4 font-weight-bold">FUNGSI</h5>
        <p>Fungsi dari EcoPulse sebagai perusahaan energi terbarukan meliputi:</p>
        <ul>
          <li>Penyedia Teknologi Hijau: Mengembangkan dan menyediakan teknologi energi terbarukan yang dapat diakses oleh berbagai kalangan.</li>
          <li>Konservasi Energi: Memberikan kontribusi terhadap konservasi energi dengan menyediakan solusi energi yang lebih efisien dan ramah lingkungan.</li>
          <li>Peningkatan Kesadaran: Mengedukasi masyarakat, pemerintah, dan lembaga terkait tentang pentingnya penggunaan energi terbarukan untuk mengurangi jejak karbon.</li>
          <li>Penyedia Jasa Konstruksi: Membangun dan menyediakan fasilitas energi bersih seperti ladang angin, instalasi panel surya, dan infrastruktur energi lainnya.</li>
          <li>Pembangunan Berkelanjutan: Membantu dalam pencapaian tujuan pembangunan berkelanjutan (SDGs) terutama dalam aspek akses energi yang bersih dan terjangkau.</li>
        </ul>
      </div>
        <div class="col-md-6">
          <img src="{{asset('asset/image/gedung.png')}}" alt="Building and sky" class="img-fluid">
        </div>
      </div>
    </div>
  </section>
  </body>

  @endsection

