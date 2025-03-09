@extends('user.master.master')
@section('content')
<div class="container  section" id="hero">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ asset('asset/image/gedung.png') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-7">
            <div class="display-4 hero">Selamat Datang di EcoPulse</div>
            <p class="lead mt-4">EcoPulse adalah platform yang menyediakan informasi seputar lingkungan hidup
                dan
                keberlanjutan. Memberdayakan masyarakat dan industri dengan solusi energi terbarukan yang
                inovatif dan
                serta menciptakan masa depan yang lebih hijau dan berkelanjutan bagi generasi mendatang.</p>
            <button class="btn btn-primary mt-3">Pelajari Lebih lanjut</button>
        </div>

    </div>
</div>
<!-- End Hero Section -->
<!-- Feature Section -->
<div id="feature"></div>
<div class="container section-1 fitur mt-5">
    <div class="text-center default-title mb-5 mt-5">Fitur kami</div>
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-md-4 sm-mt-2">
                <div class="card">
                    <img src="{{ asset('image/inventaris/default.png') }}" alt="Image" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title
                        ">Pengiriman Proposal</h5>
                        <p class="card-text">Kepala desa dapat pengajuan proposal permohonan pembangunan </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-md-0 mt-5">
                <div class="card">
                    <img src="{{ asset('image/inventaris/default.png') }}" alt="Image" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title
                        ">Forum</h5>
                        <p class="card-text">Bergbunglah dalam forum kami dan diskusikan seputar lingkungan
                            hidup</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5 mt-xl-0 mt-md-0">
                <div class="card">
                    <img src="{{ asset('image/inventaris/default.png') }}" alt="Image" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title
                        ">Pemetaaan insfrastruktur</h5>
                        <p class="card-text">Pemetaan insfrastruktur untuk energi terbarukan dan peninjauan
                            balik alat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Feature Section -->
<!-- kontak Section -->
<div class="container section-1 mt-5" id="kontak">
    <div class="text-center default-title mb-5">Kontak Kami</div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-phone mt-5 mb-5 icon-contact"></i>
                    <h5 class="card-title">Alamat</h5>
                    <p class="card-text">Jl. Raya Bandung No. 1, Bandung, Jawa Barat</p>
                    <button class="btn btn-primary mb-3">Maps</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card  mt-md-0 mt-3">
                <div class="card-body text-center">
                    <i class="fas fa-phone mt-5 mb-5 icon-contact"></i>
                    <h5 class="card-title">Alamat</h5>
                    <p class="card-text">Jl. Raya Bandung No. 1, Bandung, Jawa Barat</p>
                    <a class="btn btn-primary mb-3">Contact me</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card  mt-md-0 mt-3">
                <div class="card-body text-center">
                    <i class="fas fa-phone mt-5 mb-5 icon-contact"></i>
                    <h5 class="card-title">Alamat</h5>
                    <p class="card-text">Jl. Raya Bandung No. 1, Bandung, Jawa Barat</p>
                    <a class="btn btn-primary mb-3">Contact me</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
