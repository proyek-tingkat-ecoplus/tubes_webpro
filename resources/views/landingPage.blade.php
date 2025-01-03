@extends('main.main')
@section('content')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@push ('script')
    <script type="text/javascript" src="{{ asset('asset/js/landingPage.js') }}"></script>
@endpush

<section class="hero-section">
    <img src="{{asset('asset/image/pabrik.jpeg')}}" class="img-fluid img-hero" alt="Responsive image">
</section>

<!-- Deskripsi singkat -->
<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="description">Memberdayakan masyarakat dan industri dengan solusi energi terbarukan yang
                    inovatif dan
                    berkelanjutan.
                    Kami berkomitmen untuk menyediakan analisis dan peninjauan mendalam terhadap teknologi energi
                    bersih,
                    guna mendukung transisi global menuju penggunaan energi yang ramah lingkungan, mengurangi jejak
                    karbon,
                    serta menciptakan masa depan yang lebih hijau dan berkelanjutan bagi generasi mendatang.</div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('asset/image/panel.jpeg') }}" alt="Solar Roof 2" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- Form Informasi Energi Bersih -->
<section class="energi-info-section">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-6">
                <div id="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5708895213024!2d107.65214697499673!3d-6.941775893058302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8172d074f1f%3A0xf309f9b68cb6a7f8!2sDinas%20Energi%20dan%20Sumber%20Daya%20Mineral%20Prov.%20Jawa%20Barat!5e0!3m2!1sen!2sid!4v1729610728616!5m2!1sen!2sid"
                        width="700" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div> --}}
            <div class="col-md-6">
                {{-- <form id="energiForm">
                    @csrf
                    <h4>Informasi Energi Terbarukan</h4>
                    <div class="form-group">
                        <label for="energi">Nama Energi Terbarukan</label>
                        <input type="text" id="energi" name="energi" class="form-control" required>
                        <div id="error-energi" style="color: red; display: none;"></div>
                        <script>
                            document.getElementById('submitBtn').addEventListener('click', function (event)) {
                                var energiInput = document.getElementById('energi');
                                var errorEnergiDiv = document.getElementById('error-energi');

                                errorEnergiDiv.style.display = 'none';
                                errorEnergiDiv.textContent = '';

                                if (energiInput.value.length < 5) {
                                    errorEnergiDiv.textContent = 'Nama Energi Terbarukan harus terdiri dari minimal 5 karakter.';
                                    errorEnergiDiv.style.display = 'block';
                                    energiInput.classList.add('is-invalid');
                                    event.preventDefault();
                                } else {
                                    energiInput.classList.remove('is-invalid');
                                }
                            }
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="penanggungJawab">Nama Penanggungjawab</label>
                        <input type="text" id="penanggungJawab" name="penanggungJawab" class="form-control" required>
                        <div id="error-penanggungJawa" style="color: red; display: none;"></div>

                        <script>
                            document.getElementById('submitBtn').addEventListener('click', function (event)) {
                                var penanggungJawabInput = document.getElementById('penanggungJawab');
                                var errorPJDiv = document.getElementById('error-penanggungJawab');

                                errorPJDiv.style.display = 'none';
                                errorPJDiv.textContent = '';

                                if (penanggungJawabInput.value.length < 5) {
                                    errorPJDiv.textContent = 'Nama Penanggungjawab harus terdiri dari minimal 5 karakter.';
                                    errorPJDiv.style.display = 'block';
                                    penanggungJawabInput.classList.add('is-invalid');
                                    event.preventDefault();
                                } else {
                                    penanggungJawabInput.classList.remove('is-invalid');
                                }

                            }
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="binwas">Tanggal Binwas</label>
                        <input type="date" id="binwas" name="date" required />
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
                        <select id="thnOperasi" name="thnOperasi" class="form-control" required>
                            <option value="" disabled selected class="placeholder">Pilih Tahun</option>
                            <script>
                                var currentYear = new Date().getFullYear();
                                for (let year = 2010; year <= currentYear; year++) {
                                    document.write(`<option value="${year}">${year}</option>`);
                                }
                            </script>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="latLong">Lat Long</label>
                        <input type="text" id="latLong" name="latLong" class="form-control" required>
                    </div>
                    <button type="submit" class="ms-1 btn btn-primary">Kirim</button>
                </form> --}}
            </div>
        </div>
    </div>
</section>

<!-- Kontak -->
<section class="kontak-info-section">
    <div class="container-fluid">
        <div class="row">
            <div class="kontak-background col-12">
                <h3>Kontak</h3>
                <p>Hubungi kami, jika anda memiliki pertanyaan terkait platform ini.</p>
            </div>
            <div class="card mx-auto card-style">
                <div class="row">
                    <div class="col-md-4 mb-3 z-index" style="background-color: #FFFF">
                        <div class="card m-5">
                            <i class="fa-solid fa-map-location fa-xl"></i>
                            <h6>ALAMAT</h6>
                            <p>Kompleks Tahura, Jl. Ir. H. Juanda No.99,
                                Ciburial, Kec. Cimenyan, Kabupaten Bandung,
                                Jawa Barat 40198</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 z-index" style="background-color: #F6F6F6">
                        <div class="card m-5" style="background-color: #F6F6F6">
                            <i class="fa-solid fa-phone fa-xl"></i>
                            <h6>HUBUNGI KAMI</h6>
                            <p><b>Kepala Dinas Energi Bersih</b></p>
                            <p>+22-3214458</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 z-index" style="background-color: #FFFF">
                        <div class="card m-5 ">
                            <i class="fa-solid fa-envelope fa-xl"></i>
                            <h6>EMAIL</h6>
                            <p><b>Kepala Dinas Energi Bersih</b></p>
                            <p>admin.Ecopulse@gmail.com</p>
                        </div>
                    </div>
                    <div class="maps-background col-12 z-1">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5708895213024!2d107.65214697499673!3d-6.941775893058302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8172d074f1f%3A0xf309f9b68cb6a7f8!2sDinas%20Energi%20dan%20Sumber%20Daya%20Mineral%20Prov.%20Jawa%20Barat!5e0!3m2!1sen!2sid!4v1729610728616!5m2!1sen!2sid"
                            allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
