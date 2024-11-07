@extends('main.main')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{asset('asset/css/pages/profil_kepdes.css')}}">
@endpush
@section('content')
<div class="container-fluid">
    <img src="{{asset('asset/image/pabrik.jpeg')}}" class="img-fluid img-hero" alt="Responsive image">
    <div class="card mx-auto card-style" id="carouselCard">
        
        <!-- Carousel Bootstrap -->
        <div id="profileCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Profile 1 -->
                <div class="carousel-item active">
                    <div class="profile-card">
                        <img src="{{asset('asset/image/orang.png')}}" class="img-fluid rounded-circle mb-3" alt="Kepala Dinas">
                        <h5 class="fw-bold text-white">Dr. Rendy, S.T., M.T., Ph.D.</h5>
                        <div class="text-light mt-2">Kepala Dinas Energi Bersih Terbarukan</div>
                    </div>
                </div>
                
                <!-- Profile 2 -->
                <div class="carousel-item">
                    <div class="profile-card">
                        <img src="{{asset('asset/image/orang.png')}}" class="img-fluid rounded-circle mb-3" alt="Wakil Kepala Dinas">
                        <h5 class="fw-bold text-green">Dr. Ratna, S.T., M.T., Ph.D.</h5>
                        <div class="text-green mt-2">Wakil Kepala Dinas Energi Bersih Terbarukan</div>
                    </div>
                </div>
                
                <!-- Profile 3 -->
                <div class="carousel-item">
                    <div class="profile-card">
                        <img src="{{asset('asset/image/orang.png')}}" class="img-fluid rounded-circle mb-3" alt="Sekretaris Dinas">
                        <h5 class="fw-bold text-white">Dr. Arif, S.T., M.T., Ph.D.</h5>
                        <div class="text-light mt-2">Sekretaris Dinas Energi Bersih Terbarukan</div>
                    </div>
                </div>
                
                <!-- Profile 4 -->
                <div class="carousel-item">
                    <div class="profile-card">
                        <img src="{{asset('asset/image/orang.png')}}" class="img-fluid rounded-circle mb-3" alt="Bendahara Dinas">
                        <h5 class="fw-bold text-green">Dr. Josep, S.T., M.T., Ph.D.</h5>
                        <div class="text-green mt-2">Bendahara Dinas Energi Bersih Terbarukan</div>
                    </div>
                </div>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#profileCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#profileCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
@endsection
@stack('scripts')
    <script src="{{asset('asset/js/profil_kepdes.js')}}"></script>