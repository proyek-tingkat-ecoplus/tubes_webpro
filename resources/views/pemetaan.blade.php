@extends('main.main')
@section('content')
@push ('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/pages/kontakCards.css')}}">
@endpush
<section class="hero-section">
    <img src="{{asset('asset/image/pabrik.jpeg')}}" class="img-fluid img-hero" alt="Responsive image">
</section>


<!-- Form Informasi Energi Bersih -->
<section class="energi-info-section">
    <div class="container">
        <div class="text-center fs-1 fw-bold text-success-emphasis pb-5">Hello World</div>
        <div class="row">
            <div class="col-md-6">
                <div id="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5708895213024!2d107.65214697499673!3d-6.941775893058302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8172d074f1f%3A0xf309f9b68cb6a7f8!2sDinas%20Energi%20dan%20Sumber%20Daya%20Mineral%20Prov.%20Jawa%20Barat!5e0!3m2!1sen!2sid!4v1729610728616!5m2!1sen!2sid"
                        width="700" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <form>
                    @csrf
                    <h4>Informasi Energi Terbarukan</h4>
                    <div class="form-group">
                        <label for="energi">Nama Energi Terbarukan</label>
                        <input type="text" id="energi" name="energi" class="form-control" required>
                        <div id="error-energi" style="color: red; display: none;"></div>
                    </div>
                    <div class="form-group">
                        <label for="penanggungJawab">Nama Penanggungjawab</label>
                        <input type="text" id="penanggungJawab" name="penanggungJawab" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="binwas">Tanggal Binwas</label>
                        <input type="text" id="binwas" name="binwas" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cabang">Area Cabang ESDM</label>
                        <input type="text" id="cabang" name="cabang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kapasitas">Kapasitas (kW/kWp/m3)</label>
                        <input type="text" id="kapasitas" name="kapasitas" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="thnOperasi">Tahun Operasi</label>
                        <input type="text" id="thnOperasi" name="thnOperasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="latLong">Lat Long</label>
                        <input type="text" id="latLong" name="latLong" class="form-control" required>
                    </div>
                    <button type="submit" class="ms-1 btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</section>