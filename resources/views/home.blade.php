@extends('main.main')
@section('content')
 <!-- Carousel -->
 <section class="carousel-area">
    <div class="swiper swiper1">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{asset('asset/image/gambar-berita.png')}}" alt="Gambar"></div>
            <div class="swiper-slide"><img src="{{asset('asset/image/gambar-berita.png')}}" alt="Gambar"></div>
            <div class="swiper-slide"><img src="{{asset('asset/image/gambar-berita.png')}}" alt="Gambar"></div>
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
            <div class="col-md-7 data-col2">
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
<!-- Lowongan -->
<section class="lowongan-area">
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8 col-md-10">
                <p class="lowongan-main-title">Informasi Lowongan Kerja Terkini</p>
            </div>
        </div>
        <hr style="border: 2px solid #E5E5E5;"><br>
        <div class="row justify-content-center" id="Lowongan">
            {{-- <div class="col-lg-3 col-md-5 col-sm-9 mb-3">
                <div class="card h-100 lowongan-card">
                    <div class="d-flex bd-highlight mb-3">
                        <div class="p-2 flex-grow-1 bd-highlight lowongan-text">1 hari yang lalu</div>
                        <div class="p-2 bd-highlight"><a href="" style="color: #C4C4C4;"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                    class="bi bi-share-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
                                </svg></a></div>
                        <div class="p-2 bd-highlight"><a href="" style="color: #C4C4C4;"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                    class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                </svg></a></div>
                    </div>
                    <div class="text-center">
                        <img src="{{asset('asset/image/logo-alfamart.png')}}"
            style="max-height:106px;max-width:400px" alt="Logo">
        </div>
        <div class="justify-content-between mt-4">
            <p class="lowongan-title1"><a>PT Sumber Alfaria Trijaya Tbk</a></p>
            <hr>
        </div>
        <div class="lowongan-content">
            <p class="lowongan-title2">Crew Store
                (Kasir / Pramuniaga)</p>
            <div class="lowongan-text1 mt-3 mb-3">
                <p>Kualifikasi / Persyaratan :</p>
                <p>Laki - laki atau perempuan</p>
                <p>Usia 18 - 24 tahun</p>
                <p>Belum menikah</p>
            </div>
            <div class="lowongan-text1 mt-3 mb-3">
                <p><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                        class="bi bi-geo-alt-fill" viewBox="0 0 16 16" style="margin-right: 10px;">
                        <path
                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                    </svg> Cimahi, Jawa Barat</p>
                <p><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                        class="bi bi-cash" viewBox="0 0 16 16" style="margin-right: 10px;">
                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                        <path
                            d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                    </svg> <a href="" target="_blank" style="margin-right: 4px;">Login</a> untuk melihat
                    gaji</p>
            </div>
        </div>

        <div class="container text-center">
            <a class="lowongan-btn1" href="">Lihat</a>
            <a class="lowongan-btn2" href="">Lamar</a>
        </div>
    </div>
    </div>
    <div class="col-lg-3 col-md-5 col-sm-9 mb-3">
        <div class="card h-100 lowongan-card">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 flex-grow-1 bd-highlight lowongan-text">1 hari yang lalu</div>
                <div class="p-2 bd-highlight"><a href="" style="color: #C4C4C4;"><svg
                            xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                            class="bi bi-share-fill" viewBox="0 0 16 16">
                            <path
                                d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
                        </svg></a></div>
                <div class="p-2 bd-highlight"><a href="" style="color: #C4C4C4;"><svg
                            xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg></a></div>
            </div>
            <div class="text-center">
                <img src="{{asset('asset/image/logo-alfamart.png')}}" style="max-height:106px;max-width:400px"
                    alt="Logo">
            </div>
            <div class="justify-content-between mt-4">
                <p class="lowongan-title1"><a>PT Sumber Alfaria Trijaya Tbk</a></p>
                <hr>
            </div>
            <div class="lowongan-content">
                <p class="lowongan-title2">Crew Store
                    (Kasir / Pramuniaga)</p>
                <div class="lowongan-text1 mt-3 mb-3">
                    <p>Kualifikasi / Persyaratan :</p>
                    <p>Laki - laki atau perempuan</p>
                    <p>Usia 18 - 24 tahun</p>
                    <p>Belum menikah</p>
                </div>
                <div class="lowongan-text1 mt-3 mb-3">
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16" style="margin-right: 10px;">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg> Cimahi, Jawa Barat</p>
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                            class="bi bi-cash" viewBox="0 0 16 16" style="margin-right: 10px;">
                            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                            <path
                                d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                        </svg> <a href="" target="_blank" style="margin-right: 4px;">Login</a> untuk melihat
                        gaji</p>
                </div>
            </div>

            <div class="container text-center">
                <a class="lowongan-btn1" href="">Lihat</a>
                <a class="lowongan-btn2" href="">Lamar</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-5 col-sm-9 mb-3">
        <div class="card h-100 lowongan-card">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 flex-grow-1 bd-highlight lowongan-text">1 hari yang lalu</div>
                <div class="p-2 bd-highlight"><a href="" style="color: #C4C4C4;"><svg
                            xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                            class="bi bi-share-fill" viewBox="0 0 16 16">
                            <path
                                d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
                        </svg></a></div>
                <div class="p-2 bd-highlight"><a href="" style="color: #C4C4C4;"><svg
                            xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg></a></div>
            </div>
            <div class="text-center">
                <img src="{{asset('asset/image/logo-alfamart.png')}}" style="max-height:106px;max-width:400px"
                    alt="Logo">
            </div>
            <div class="justify-content-between mt-4">
                <p class="lowongan-title1"><a>PT Sumber Alfaria Trijaya Tbk</a></p>
                <hr>
            </div>
            <div class="lowongan-content">
                <p class="lowongan-title2">Crew Store
                    (Kasir / Pramuniaga)</p>
                <div class="lowongan-text1 mt-3 mb-3">
                    <p>Kualifikasi / Persyaratan :</p>
                    <p>Laki - laki atau perempuan</p>
                    <p>Usia 18 - 24 tahun</p>
                    <p>Belum menikah</p>
                </div>
                <div class="lowongan-text1 mt-3 mb-3">
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16" style="margin-right: 10px;">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg> Cimahi, Jawa Barat</p>
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                            class="bi bi-cash" viewBox="0 0 16 16" style="margin-right: 10px;">
                            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                            <path
                                d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                        </svg> <a href="" target="_blank" style="margin-right: 4px;">Login</a> untuk melihat
                        gaji</p>
                </div>
            </div>

            <div class="container text-center">
                <a class="lowongan-btn1" href="">Lihat</a>
                <a class="lowongan-btn2" href="">Lamar</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-5 col-sm-9 mb-3">
        <div class="card h-100 lowongan-card">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 flex-grow-1 bd-highlight lowongan-text">1 hari yang lalu</div>
                <div class="p-2 bd-highlight"><a href="" style="color: #C4C4C4;"><svg
                            xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                            class="bi bi-share-fill" viewBox="0 0 16 16">
                            <path
                                d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
                        </svg></a></div>
                <div class="p-2 bd-highlight"><a href="" style="color: #C4C4C4;"><svg
                            xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg></a></div>
            </div>
            <div class="text-center">
                <img src="{{asset('asset/image/logo-alfamart.png')}}" style="max-height:106px;max-width:400px"
                    alt="Logo">
            </div>
            <div class="justify-content-between mt-4">
                <p class="lowongan-title1"><a>PT Sumber Alfaria Trijaya Tbk</a></p>
                <hr>
            </div>
            <div class="lowongan-content">
                <p class="lowongan-title2">Crew Store
                    (Kasir / Pramuniaga)</p>
                <div class="lowongan-text1 mt-3 mb-3">
                    <p>Kualifikasi / Persyaratan :</p>
                    <p>Laki - laki atau perempuan</p>
                    <p>Usia 18 - 24 tahun</p>
                    <p>Belum menikah</p>
                </div>
                <div class="lowongan-text1 mt-3 mb-3">
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16" style="margin-right: 10px;">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg> Cimahi, Jawa Barat</p>
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                            class="bi bi-cash" viewBox="0 0 16 16" style="margin-right: 10px;">
                            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                            <path
                                d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                        </svg> <a href="" target="_blank" style="margin-right: 4px;">Login</a> untuk melihat
                        gaji</p>
                </div>
            </div>

            <div class="container text-center">
                <a class="lowongan-btn1" href="">Lihat</a>
                <a class="lowongan-btn2" href="">Lamar</a>
            </div>
        </div>
    </div> --}}
    </div>
    <div class="row justify-content-center my-3">
        <div class="col-lg col-md-10 text-right">
            <a class="lowongan-btn3" href="">Lihat lowongan kerja lainnya <svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                </svg></a>
        </div>
    </div>
    </div>
</section>

<!-- Pelatihan -->
<section class="pelatihan-area">
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8 col-md-10">
                <p class="pelatihan-main-title">Pelatihan Terkini</p>
            </div>
        </div>
        <hr style="border: 2px solid #406392;"><br>
        <div class="row row-cols-1 row-cols-md-2" id="Training">
            <div class="col mb-4">
                <div class="h-100">
                    <div class="row">
                        <div class="col">
                            <img src="{{asset('asset/image/gambar-berita.png')}}" alt="Gambar">
        </div>
        <div class="col">
            <p class="pelatihan-title">Menjahit</p>
            <p class="pelatihan-text">Menjahit pakaian dengan mesin</p>
            <a class="pelatihan-btn1" href="">Lihat</a>
        </div>
    </div>
    <hr style="border: 2px solid #406392;">
    </div>
    </div> --}}
    {{-- <div class="col mb-4">
                <div class="h-100">
                    <div class="row">
                        <div class="col">
                            <img src="{{asset('asset/image/gambar-berita.png')}}" alt="Gambar">
    </div>
    <div class="col">
        <p class="pelatihan-title">Menjahit</p>
        <p class="pelatihan-text">Menjahit pakaian dengan mesin</p>
        <a class="pelatihan-btn1" href="">Lihat</a>
    </div>
    </div>
    <hr style="border: 2px solid #406392;">
    </div>
    </div>
    <div class="col mb-4">
        <div class="h-100">
            <div class="row">
                <div class="col">
                    <img src="{{asset('asset/image/gambar-berita.png')}}" alt="Gambar">
                </div>
                <div class="col">
                    <p class="pelatihan-title">Menjahit</p>
                    <p class="pelatihan-text">Menjahit pakaian dengan mesin</p>
                    <a class="pelatihan-btn1" href="">Lihat</a>
                </div>
            </div>
            <hr style="border: 2px solid #406392;">
        </div>
    </div>
    <div class="col mb-4">
        <div class="h-100">
            <div class="row">
                <div class="col">
                    <img src="{{asset('asset/image/gambar-berita.png')}}" alt="Gambar">
                </div>
                <div class="col">
                    <p class="pelatihan-title">Menjahit</p>
                    <p class="pelatihan-text">Menjahit pakaian dengan mesin</p>
                    <a class="pelatihan-btn1" href="">Lihat</a>
                </div>
            </div>
            <hr style="border: 2px solid #406392;">
        </div>
    </div>
    <div class="col mb-4">
        <div class="h-100">
            <div class="row">
                <div class="col">
                    <img src="{{asset('asset/image/gambar-berita.png')}}" alt="Gambar">
                </div>
                <div class="col">
                    <p class="pelatihan-title">Menjahit</p>
                    <p class="pelatihan-text">Menjahit pakaian dengan mesin</p>
                    <a class="pelatihan-btn1" href="">Lihat</a>
                </div>
            </div>
            <hr style="border: 2px solid #406392;">
        </div>
    </div>
    <div class="col mb-4 text-right">
        <a class="pelatihan-btn2" href="">Lihat pelatihan lainnya <svg xmlns="http://www.w3.org/2000/svg" width="16"
                height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
            </svg></a>
    </div>
    </div>
    </div>
</section>

<!-- Berita -->
<section class="berita-area">
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8 col-md-10">
                <p class="berita-main-title">Berita Ketenagakerjaan</p>
            </div>
        </div>
        <hr style="border: 2px solid #E5E5E5;"><br>
        <div class="row justify-content-center" id="berita">
            {{-- <div class="col-lg-4 col-md-5 col-sm-9 mb-3">
                <div class="card h-100 berita-slide">
                    <div class="berita-img">
                        <a href="#">
                            <img src="{{asset('asset/image/gambar-berita.png')}}" alt="Gambar">
            <div class="berita-date">
                <span class="date">01</span>
                <span class="month">Okt</span>
            </div>
            </a>
        </div>
        <div class="berita-content">
            <p class="berita-cate">Kegiatan</p>
            <p class="berita-title">Lorem ipsum alaium gambreng</p>
            <p class="berita-description">
                Pemerintah Kota (Pemkot) Cimahi melalui Dinas Tenaga Kerja (Disnaker) meluncurkan
                aplikasi Sidakep (Sistem Data Ketenagakerjaan dan Pelatihan Terintegrasi). Acara
                tersebut berlangsung di Cimahi Technopark, Jumat (24/9). Kegiatan ini dihadiri dan
                dibuka secara ...
            </p>
        </div>
    </div>
    </div>
    <div class="col-lg-4 col-md-5 col-sm-9 mb-3">
        <div class="card h-100 berita-slide">
            <div class="berita-img">
                <a href="#">
                    <img src="{{asset('asset/image/gambar-berita.png')}}" alt="Gambar">
                    <div class="berita-date">
                        <span class="date">01</span>
                        <span class="month">Okt</span>
                    </div>
                </a>
            </div>
            <div class="berita-content">
                <p class="berita-cate">Kegiatan</p>
                <p class="berita-title">Asyik! Lewat Sidakeptri, Pencaker di Cimahi Mudah Cari Informasi
                    Lowongan Kerja</p>
                <p class="berita-description">
                    Pemkot Cimahi melalui Dinas Tenaga Kerja (Disnaker) mengembangkan aplikasi sistem
                    ketenagakerjaan dalam bentuk sarana pelayanan secara online, yakni Sistem Link And Match
                    (Silima) yang bertransformasi ke Sistem Informasi Data Ketenagakerjaan dan Pelatihan
                    Terintegrasi (Sidakeptri). Lewat aplikasi tersebut pencari ...
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-5 col-sm-9 mb-3">
        <div class="card h-100 berita-slide">
            <div class="berita-img">
                <a href="#">
                    <img src="{{asset('asset/image/gambar-berita.png')}}" alt="Gambar">
                    <div class="berita-date">
                        <span class="date">01</span>
                        <span class="month">Okt</span>
                    </div>
                </a>
            </div>
            <div class="berita-content">
                <p class="berita-cate">Kegiatan</p>
                <p class="berita-title">Asyik! Lewat Sidakeptri, Pencaker di Cimahi Mudah Cari Informasi
                    Lowongan Kerja</p>
                <p class="berita-description">
                    Asyik! Lewat Sidakeptri, Pencaker di Cimahi Mudah Cari Informasi Lowongan Kerja
                </p>
            </div>
        </div>
    </div> --}}
    </div>
    <div class="row justify-content-center my-3">
        <div class="col-lg col-md-10 text-right">
            <a class="berita-btn1" href="">Lihat Berita lainnya <svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                </svg></a>
        </div>
    </div>
    </div>
</section>

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
