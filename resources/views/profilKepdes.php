@extends('main.main')
@section('content')
<div class="container-fluid">
    <img src="{{asset('asset/image/pabrik.jpeg')}}" class="img-fluid img-hero" alt="Responsive image">
    <div class="card mx-auto card-style">
        <div class="fs-3 fw-bold mb-3 text-"></div>
        <div class="profile-container">
            <div class="profile-card">
                <img src="{{asset('asset/image/orang.png')}}" class="img-fluid rounded-circle mb-3" alt="Kepala Dinas">
                <h5 class="fw-bold text-white">Dr. Rendy Nugraha, S.T., M.T., Ph.D.</h5>
                <p><br>Kepala Dinas Energi Bersih Terbarukan</p>
            </div>
            <div class="profile-card">
                <img src="{{asset('asset/image/orang.png')}}" class="img-fluid rounded-circle mb-3" alt="Wakil Kepala Dinas">
                <h5 class="fw-bold text-green">Dr. Ratna Kusuma, S.T., M.T., Ph.D.</h5>
                <p><br>Wakil Kepala Dinas Energi Bersih Terbarukan</p>
            </div>
            <div class="profile-card">
                <img src="{{asset('asset/image/orang.png')}}" class="img-fluid rounded-circle mb-3" alt="Sekretaris Dinas">
                <h5 class="fw-bold text-white">Dr. Arif Pratama, S.T., M.T., Ph.D.</h5>
                <p><br>Sekretaris Dinas Energi Bersih Terbarukan</p>
            </div>
            <div class="profile-card">
                <img src="{{asset('asset/image/orang.png')}}" class="img-fluid rounded-circle mb-3" alt="Bendahara Dinas">
                <h5 class="fw-bold text-green">Dr. Diandra, S.T., M.T., Ph.D.</h5>
                <p><br>Bendahara Dinas Energi Bersih Terbarukan</p>
            </div>
        </div>
    </div>
</div>
@endsection