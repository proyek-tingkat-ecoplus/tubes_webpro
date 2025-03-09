@extends('user.master.master')
@push('styles')
<link rel="stylesheet" href="{{ asset('asset/user/css/informasi.css') }}">
@endpush
@section('content')
<div class="section-230 hero-1">
    <div class="text-center default-title">
        Misi dari EcoPulse
    </div>
    <section id="tasks-section" class="section-padding">
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
                    <img src="{{ asset('asset/image/gedung.png') }}" alt="Building and sky" class="img-fluid info-img" style="height: 80vh">
                </div>
            </div>
        </div>
    </section>

    <input type="text" hidden value="{{ asset('asset/admin/json/informasi.json') }}" id="path">

</div>
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
