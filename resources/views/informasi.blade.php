@extends('main.main')

@section('content')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/pages/kontakCards.css') }}">
@endpush

<section class="hero-section">
    <img src="{{ asset('asset/image/pabrik.jpeg') }}" class="img-fluid img-hero" alt="Responsive image">
</section>

<!-- Hero Section -->
<section id="hero-section" class="hero-section">
    <div class="container my-5 text-success-emphasis">
        <div class="bg-success text-white text-center py-4">
            <h6 class="text-uppercase text-light">Misi dari EcoPulse</h6>
            <h5 class="font-weight-bold text-light">Menyediakan solusi energi terbarukan yang inovatif untuk
                mendukung keberlanjutan dan mengurangi dampak negatif terhadap lingkungan</h5>
        </div>
        <div class="bg-dark text-white text-center py-2">
            <p class="mb-0 text-light">Meningkatkan akses energi bersih bagi masyarakat, industri, dan pemerintah</p>
        </div>
    </div>
</section>

<section id="tasks-section" class="section-padding bg-light">
    <div class="container my-5">
        <div class="row">
            <!-- Text Column -->
            <div class="col-md-6">
                <h2 class="font-weight-bold" id="title">Tugas Pokok dan Fungsi</h2>

                <!-- Tugas Section -->
                <h5 class="mt-4 font-weight-bold">TUGAS</h5>
                <p class="lh-sm mb-3 mt-2">EcoPulse memiliki tugas utama untuk mengembangkan, memproduksi, dan
                    menyediakan solusi energi bersih terbarukan dengan fokus pada teknologi yang ramah lingkungan
                    dan berkelanjutan. Beberapa tugas pokok yang dapat diuraikan sebagai berikut:</p>
                <ul id="tugas-list" style="list-style-type:disc !important"></ul>

                <!-- Fungsi Section -->
                <h5 class="mt-4 font-weight-bold">FUNGSI</h5>
                <p class="lh-lg">Fungsi dari EcoPulse sebagai perusahaan energi terbarukan meliputi:</p>
                <ul id="fungsi-list" style="list-style-type:disc !important"></ul>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('asset/image/gedung.png') }}" alt="Building and sky" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<input type="text" hidden value="{{ asset('asset/admin/json/informasi.json') }}" id="path">

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        var path = document.getElementById('path').value;

        // Memuat data JSON
        $.ajax({
            url: path,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Memasukkan judul
                $('#title').text(data.title);

                // Memasukkan data tugas ke dalam ul#tugas-list
                var tugasList = $('#tugas-list');
                data.tugas.forEach(function (item) {
                    tugasList.append('<li class="lh-sm mt-2 mb-2">' + item + '</li>');
                });

                // Memasukkan data fungsi ke dalam ul#fungsi-list
                var fungsiList = $('#fungsi-list');
                data.fungsi.forEach(function (item) {
                    fungsiList.append('<li class="lh-sm mt-2 mb-2">' + item + '</li>');
                });
            },
            error: function (jqxhr, textStatus, error) {
                console.log("Request Failed: " + textStatus + ", " + error);
            }
        });
    });
    console.log("here");
</script>
@endpush
