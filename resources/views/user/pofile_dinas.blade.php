@extends('user.master.master')
@section('content')
<div class="section-230 ">
    <!-- Header Profil -->
    <div class="text-center default-title mb-5 hero-1" style="background-color: var(--dark-green);">
        <div class="container py-5">
            <h1 class="text-white mb-3">Dinas XYZ Kabupaten ABC</h1>
            <p class="lead text-white">Melayani dengan hati untuk kemajuan bersama</p>
        </div>
    </div>

    <div class="container">
        <!-- Visi Misi -->
        <div class="row mb-5">
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header" style="background-color: var(--light-green); color: white;">
                        <h4><i class="fas fa-bullseye me-2"></i>Visi</h4>
                    </div>
                    <div class="card-body">
                        <p class="lead">"Menjadi dinas terdepan dalam pelayanan publik yang profesional dan berintegritas"</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-header" style="background-color: var(--dark-blue); color: white;">
                        <h4><i class="fas fa-tasks me-2"></i>Misi</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Meningkatkan kualitas pelayanan publik</li>
                            <li class="list-group-item">Mengembangkan SDM yang kompeten</li>
                            <li class="list-group-item">Mewujudkan tata kelola yang transparan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Struktur Organisasi -->
        <div class="card mb-5 shadow-sm">
            <div class="card-header" style="background-color: var(--dark-green); color: white;">
                <h4><i class="fas fa-sitemap me-2"></i>Struktur Organisasi</h4>
            </div>
            <div class="card-body">
                <div class="org-structure">
                    <div class="row justify-content-center">
                        @foreach ($user as $member )
                        <div class="col-md-4 mb-3">
                            <div class="org-node">
                                <h5>{{ $member->role->name }}</h5>
                                <p>{{ $member->username }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <!-- Kontak -->
        <div class="card shadow-sm mb-5">
            <div class="card-header" style="background-color: var(--light-green); color: white;">
                <h4><i class="fas fa-map-marker-alt me-2"></i>Kontak Kami</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="map-container mb-4">
                            <!-- Ganti dengan embed map -->
                            <iframe src="https://www.google.com/maps/embed?pb=..."
                                    width="100%"
                                    height="300"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy">
                            </iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-info">
                            <h5 class="mb-4">Kantor Dinas XYZ</h5>
                            <p class="mb-3">
                                <i class="fas fa-building me-2"></i>
                                Jl. Pelayanan Publik No. 123, Jakarta
                            </p>
                            <p class="mb-3">
                                <i class="fas fa-clock me-2"></i>
                                Senin-Jumat: 08.00 - 16.00 WIB
                            </p>
                            <p class="mb-3">
                                <i class="fas fa-phone me-2"></i>
                                (021) 1234-5678
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-envelope me-2"></i>
                                info@dinasxyz.id
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .org-node {
        background-color: var(--light-grey);
        border: 2px solid var(--light-green);
        border-radius: 10px;
        padding: 20px;
        margin: 10px;
        transition: transform 0.3s;
    }

    .org-node:hover {
        transform: translateY(-5px);
    }

    .team-card {
        background-color: var(--white);
        border-radius: 15px;
        transition: all 0.3s;
    }

    .team-card:hover {
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transform: translateY(-5px);
    }

    .contact-info p {
        color: var(--dark-blue);
    }

    .contact-info i {
        color: var(--light-green);
        width: 25px;
    }

    .map-container {
        border-radius: 15px;
        overflow: hidden;
    }
</style>
@endsection
