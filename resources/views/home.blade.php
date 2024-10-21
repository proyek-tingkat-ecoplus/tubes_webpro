@extends('main.main')
@section('content')
 <!-- Carousel -->
 <section class="carousel-area">
    <div class="swiper swiper1">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{asset('asset/image/kincir.jpeg')}}" alt="Gambar"></div>
            <div class="swiper-slide"><img src="{{asset('asset/image/kincir.jpeg')}}" alt="Gambar"></div>
            <div class="swiper-slide"><img src="{{asset('asset/image/kincir.jpeg')}}" alt="Gambar"></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<!-- Data -->
<section class="data-area">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 data-col1">
                <p class="data-title">Mewujudkan Profesionalisme dan Iklim Ketenagakerjaan yang Kondusif,
                    Transmigran yang Berkualitas dan Kesejahteraan Sosial yang Berkeadilan pada Tahun 2022</p>
            </div>
            <div class="col-md-7 data-col2" >
                <div class="row row-cols-1 row-cols-md-4 row-cols-sm-2">
                    <div class="card data-card1">
                        <div class="text-center mt-3">
                            <img src="{{asset('asset/image/icon-data.png')}}" alt="Logo">
                        </div>
                        <div class="card-body text-center">
                            <p class="data-card-title" id="perusahaan_tdf"></p>
                            <p class="data-card-text">perusahaan terdaftar</p>
                        </div>
                    </div>
                    <div class="card data-card2">
                        <div class="text-center mt-3">
                            <img src="{{asset('asset/image/icon-data.png')}}" alt="Logo">
                        </div>
                        <div class="card-body text-center">
                            <p class="data-card-title" id="lowongan_pkj">300</p>
                            <p class="data-card-text">lowongan
                                pekerjaan</p>
                        </div>
                    </div>
                    <div class="card data-card1">
                        <div class="text-center mt-3">
                            <img src="{{asset('asset/image/icon-data.png')}}" alt="Logo">
                        </div>
                        <div class="card-body text-center">
                            <p class="data-card-title" id="bursa_bkk"></p>
                            <p class="data-card-text">bursa kerja
                                khusus</p>
                        </div>
                    </div>
                    <div class="card data-card2">
                        <div class="text-center mt-3">
                            <img src="{{asset('asset/image/icon-data.png')}}" alt="Logo">
                        </div>
                        <div class="card-body text-center">
                            <p class="data-card-title" id="pekerja_tdf"></p>
                            <p class="data-card-text">Pekerja Perusahaan
                                Terdaftar</p>
                        </div>
                    </div>
                    <div class="card data-card2">
                        <div class="text-center mt-3">
                            <img src="{{asset('asset/image/icon-data.png')}}" alt="Logo">
                        </div>
                        <div class="card-body text-center">
                            <p class="data-card-title" id="p-ak-1"></p>
                            <p class="data-card-text">PEKERJA PEMILIK
                                AK-1 AKTIF</p>
                        </div>
                    </div>
                    <div class="card data-card1">
                        <div class="text-center mt-3">
                            <img src="{{asset('asset/image/icon-data.png')}}" alt="Logo">
                        </div>
                        <div class="card-body text-center">
                            <p class="data-card-title">300</p>
                            <p class="data-card-text">ANGGOTA
                                SERIKAT PEKERJA</p>
                        </div>
                    </div>
                    <div class="card data-card2">
                        <div class="text-center mt-3">
                            <img src="{{asset('asset/image/icon-data.png')}}" alt="Logo">
                        </div>
                        <div class="card-body text-center">
                            <p class="data-card-title">300</p>
                            <p class="data-card-text">ANGKATAN
                                KERJA</p>
                        </div>
                    </div>
                    <div class="card data-card1">
                        <div class="text-center mt-3">
                            <img src="{{asset('asset/image/icon-data.png')}}" alt="Logo">
                        </div>
                        <div class="card-body text-center">
                            <p class="data-card-title">300</p>
                            <p class="data-card-text">PENEMPATAN
                                TENAGA KERJA</p>
                        </div>
                    </div>
                    <div class="card data-card1">
                        <div class="text-center mt-3">
                            <img src="{{asset('asset/image/icon-data.png')}}" alt="Logo">
                        </div>
                        <div class="card-body text-center">
                            {{-- <p class="data-card-title">300</p> --}}
                            <p class="data-card-text">UPAH MINIMUN KERJA
                                KOTA CIMAHI 2022</p>
                        </div>
                    </div>
                    <div class="card data-card2">
                        <div class="text-center mt-3">
                            <img src="{{asset('asset/image/icon-data.png')}}" alt="Logo">
                        </div>
                        <div class="card-body text-center">
                            <p class="data-card-title" id="pencaker"></p>
                            <p class="data-card-text">PENCARI KERJA
                                HASIL SURVEY 2022</p>
                        </div>
                    </div>
                    <div class="card data-card1">
                        <div class="text-center mt-3">
                            <img src="{{asset('asset/image/icon-data.png')}}" alt="Logo">
                        </div>
                        <div class="card-body text-center">
                            <p class="data-card-title" id="lpdk"></p>
                            <p class="data-card-text">LEMBAGA PENDIDIKAN DAN KETERAMPILAN </p>
                        </div>
                    </div>
                    <div class="card data-card2">
                        <div class="text-center mt-3">
                            <img src="{{asset('asset/image/icon-data.png')}}" alt="Logo">
                        </div>
                        <div class="card-body text-center">
                            <p class="data-card-title">300</p>
                            <p class="data-card-text">SERIKAT KERJA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Profil -->
<section class="profil-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img class="profil-img" src="{{asset('asset/image/foto-profil.png')}}" alt="Gambar">
            </div>
            <div class="col-md-9">
                <p class="profil-title">Sambutan Kepala Dinas</p>
                <p class="profil-text">Assalammualaikum. Wr. Wb.<br>Puji Syukur kita panjatkan kepada ALLAH SWT</p>
                <p class="profil-text">Dalam rangka meningkatkan layanan publik terkait penyediaan data dan informasi di bidang ketenagakerjaan dan ketransmigrasian, kami memfasilitasi dengan mengembangkan website baru yang beralamat disnaker.cimahikota.go.id dan bkol.cimahikota.go.id</p>
                <p class="profil-text">
                    <span id="dots"></span><span id="more">erisque enim
                        ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa.
                        Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum
                        dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui
                        eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus
                        pulvinar nibh tempor porta.</span></p>
                <a onclick="myFunction()" id="myBtn" class="profil-btn1">Tampilkan selengkapnya</a>
            </div>
        </div>
    </div>
</section>

<!-- Search -->
<form action="/cari" method="POST" autocomplete="off" >
    @csrf
<section class="search-area">
    <div class="row no-gutters">
        <div class="col-md-6 no-gutters">
            <div class="search-left">
                <div class="search-container">
                    <p class="search-title1">Temukan Pekerjaan Sesuai Minat dan Keahlianmu</p>
                    <hr style="border: 2px solid #406392;"><br>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" id="kategori" class="btn tipe button1">Lowongan</button>
                        <button type="button" id="kategori" class="btn tipe button2">Pencari Kerja</button>
                        <input type="text" class="d-none" id="cari-tipe" name="tipe">
                    </div>
                    <div class="input-group mt-5">
                        <input type="text" class="form-control w-80" id="cari" name="cari" aria-label="Amount (to the nearest dollar)" autocomplete="false">
                        <div class="input-group-append">
                            <button type="submit" id="button-search" class="btn button3" ><i class="bi bi-search"> </i> CARI</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-6 no-gutters">
                <div class="search-right">
                    <div class="search-container">
                        <p class="search-title2">Pencarian Terpopuler</p>
                        <br>
                        <div class="search-popular">
                            <a href="javascript:void(0)" class="sugestions_a">Kucing</a>
                            <a href="javascript:void(0)" class="sugestions_a">Tas</a>
                            <a href="javascript:void(0)" class="sugestions_a">Ayam</a>
                            <a href="javascript:void(0)" class="sugestions_a">Baju</a>
                            <a href="javascript:void(0)" class="sugestions_a">Kambing</a>
                            <a href="javascript:void(0)" class="sugestions_a">Darmaji</a>
                            <a href="javascript:void(0)" class="sugestions_a">Dahar</a>
                            <a href="javascript:void(0)" class="sugestions_a">Lima</a>
                            <a href="javascript:void(0)" class="sugestions_a">Ngaku</a>
                            <a href="javascript:void(0)" class="sugestions_a">Hiji</a>
                            <a href="javascript:void(0)" class="sugestions_a">Kucing</a>
                            <a href="javascript:void(0)" class="sugestions_a">Tas</a>
                            <a href="javascript:void(0)" class="sugestions_a">Ayam</a>
                            <a href="javascript:void(0)" class="sugestions_a">Baju</a>
                            <a href="javascript:void(0)" class="sugestions_a">Microsoft Office</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</form>

<!-- Kontak -->
<section class="kontak-area container">
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-12 col-md-12">
                <p class="kontak-main-title">Kontak</p>
                <br>
                <p class="kontak-text">Hubungi kami, jika anda memiliki pertanyaan terkait platform ini.</p>
            </div>
        </div>
        <div class="container my-5">
            <div class="row justify-content-center card-group mx-auto kontak-card-group">
                <div class="card col-lg-4 col-sm-9 mb-3 kontak-card">
                    <div class="text-center">
                        <img src="{{asset('asset/image/icon_loca.png')}}" style="max-height:53px;max-width:200px"
                            alt="Logo">
                    </div>
                    <div class="card-body">
                        <p class="kontak-title1">Alamat</p>
                        <br>
                        <p class="kontak-text1">Jln. Raden Demang Hardjakusumah Komplek Perkantoran Pemkot Cimahi
                        </p>
                    </div>
                </div>
                <div class="card bg-light col-lg-4 col-sm-9 mb-3 kontak-card">
                    <div class="text-center">
                        <img src="{{asset('asset/image/icon_email.png')}}" style="max-height:53px;max-width:200px"
                            alt="Logo">
                    </div>
                    <div class="card-body">
                        <p class="kontak-title1">Email</p>
                        <br>
                        <p class="kontak-text1">Dinas Tenaga Kerja Kota Cimahi <b
                                style="text-decoration: underline;">disnaker@cimahikota.go.id</b></p>
                    </div>
                </div>
                <div class="card col-lg-4 col-sm-9 mb-3 kontak-card">
                    <div class="text-center">
                        <img src="{{asset('asset/image/icon_tele.png')}}" style="max-height:53px;max-width:200px"
                            alt="Logo">
                    </div>
                    <div class="card-body">
                        <p class="kontak-title1">Telepon</p>
                        <br>
                        <p class="kontak-text1">Dinas Tenaga Kerja Kota Cimahi
                            <b>022-6631883</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Peta -->
<section class="map-area container">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.676322318317!2d107.5547449!3d-6.8703338!3m2!1i1024!2i768!4f13.1!3m3!3m2!1sen!2sid!4v1632803302680!5m2!1sen!2sid"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>

<!-- Link -->
<section class="link-area">
    <div class="link-padding container text-center">
        <div class="row my-3">
            <div class="col-lg-12 col-md-12">
                <p class="link-main-title">Link Terkait :</p>
            </div>
        </div>
        <div class="row justify-content-around" style="padding: 30px 0px 0px 0px;">
            <div class="col-md-3 col-sm-6 mb-3">
                <a href="" target="_blank">
                    <div class="text-center pl-0 pr-0 border-0">
                        <div class="container">
                            <img src="{{asset('asset/image/logo-kotacimahi.png')}}" alt="Logo" class="link-image">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <a href="" target="_blank">
                    <div class="text-center pl-0 pr-0 border-0">
                        <div class="container">
                            <img src="{{asset('asset/image/logo-jabar.png')}}" alt="Logo" class="link-image">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <a href="" target="_blank">
                    <div class="text-center pl-0 pr-0 border-0">
                        <div class="container">
                            <img src="{{asset('asset/image/logo-kemnaker.png')}}" alt="Logo" class="link-image">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <a href="" target="_blank">
                    <div class="text-center pl-0 pr-0 border-0">
                        <div class="container">
                            <img src="{{asset('asset/image/logo-kemnaker1.png')}}" alt="Logo" class="link-image">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
