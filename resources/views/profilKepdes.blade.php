@extends('main.main')
@push('styles')
<link rel="stylesheet" href="{{asset('asset/css/pages/profil_kepdes.css')}}">
@endpush
@section('content')
<div class="container-fluid">
    <img src="{{asset('asset/image/pabrik.jpeg')}}" class="img-fluid img-hero" alt="Responsive image">
    <div class="card mx-auto card-style">
        <div class="fs-3 fw-bold mb-3 text-"></div>
        <div class="profile-container">
            <div class="profile-card">
                <img src="{{asset('asset/image/orang.png')}}" class="img-fluid rounded-circle mb-3" alt="Kepala Dinas">
                <h5 class="fw-bold text-white">Dr. Rendy, S.T., M.T., Ph.D.</h5>
                <div class="text-light mt-2">Kepala Dinas Energi Bersih Terbarukan</div>
            </div>
            <div class="profile-card">
                <img src="{{asset('asset/image/orang.png')}}" class="img-fluid rounded-circle mb-3" alt="Wakil Kepala Dinas">
                <h5 class="fw-bold text-green">Dr. Ratna , S.T., M.T., Ph.D.</h5>
                <div class="text-green mt-2">Wakil Kepala Dinas Energi Bersih Terbarukan</div>
            </div>
            <div class="profile-card">
                <img src="{{asset('asset/image/orang.png')}}" class="img-fluid rounded-circle mb-3" alt="Sekretaris Dinas">
                <h5 class="fw-bold text-white">Dr. Arif , S.T., M.T., Ph.D.</h5>
                <div class="text-light mt-2">Sekretaris Dinas Energi Bersih Terbarukan</div>
            </div>
            <div class="profile-card">
                <img src="{{asset('asset/image/orang.png')}}" class="img-fluid rounded-circle mb-3" alt="Bendahara Dinas">
                <h5 class="fw-bold text-green ">Dr. josep, S.T., M.T., Ph.D.</h5>
                <div class="text-green mt-2">Bendahara Dinas Energi Bersih Terbarukan</div>
            </div>
        </div>
    </div>
</div>
@endsection