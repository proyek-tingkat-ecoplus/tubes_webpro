@extends('main.main')
@section('content')
<img src="{{asset('asset/image/pabrik.jpeg')}}" class="img-fluid img-hero" alt="Responsive image">
<div class="form">
    <section class="pos">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="tambah diskusi baru" aria-label="tambah diskusi baru" aria-describedby="button-addon2">
            <button class="btn search-bar" type="button" id="button-addon2">
                <i class="fa-solid fa-plus"></i>
            </button>
          </div>
        <div class="post-item rounded-3">
            <h3 class="d-blok mb-3" style="color: white">Infastruktur terbaru</h3>
            <div class="d-flex">
                <div class="profile">
                    <div class="profile rounded-circle"> <img src="{{asset('asset/image/icon-data.png')}}" alt=""></div>
                </div>
                <div class="content">
                    <p class="nama">Rendy Nugraha</p>
                    <p class="jam-pengisian">2 hours ago</p>
                    <p class="isi"><span> Infrastruktur terbaru </span>  dimana kita akan menempatkan berberpa kincir air di desa desa dengan
                        debit dan arus air yang memumpuni untuk mengerakan kincir air sehingga bisa di ubah menjadi
                        energi listrik tanpa adanya gas limbah yang di buang ke alam.</p>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="pesan w-50 ">
                                    <div class="input-group mb-3 ">
                                        <button class="btn balas-pesan" type="button" id="button-addon1">
                                            <i class="fa-solid fa-message"></i>
                                        </button>
                                        <input type="text" class="form-control " placeholder="balas pesan" aria-label="balas pesan" aria-describedby="button-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group mb-3 mt-3 ">
                                    <span class="input-group-text rounded-pill" id="basic-addon1">+20 partispan</span>
                                  </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="post-item rounded-3">
            <h3 class="d-blok mb-3" style="color: white">Infastruktur terbaru</h3>
            <div class="d-flex">
                <div class="profile">
                    <div class="profile rounded-circle"> <img src="{{asset('asset/image/icon-data.png')}}" alt=""></div>
                </div>
                <div class="content">
                    <p class="nama">Rendy Nugraha </p>
                    <p class="jam-pengisian">2 hours ago</p>
                    <p class="isi"><span> Infrastruktur terbaru </span> dimana kita akan menempatkan berberpa kincir air di desa desa dengan
                        debit dan arus air yang memumpuni untuk mengerakan kincir air sehingga bisa di ubah menjadi
                        energi listrik tanpa adanya gas limbah yang di buang ke alam.</p>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="pesan w-50 ">
                                <div class="input-group mb-3 ">
                                    <button class="btn balas-pesan" type="button" id="button-addon1">
                                        <i class="fa-solid fa-message"></i>
                                    </button>
                                    <input type="text" class="form-control " placeholder="balas pesan" aria-label="balas pesan" aria-describedby="button-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group mb-3 mt-3 ">
                                <span class="input-group-text rounded-pill" id="basic-addon1">+20 partispan</span>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="post-item rounded-3">
            <h3 class="d-blok mb-3" style="color: white">Infastruktur terbaru</h3>
            <div class="d-flex">
                <div class="profile">
                    <div class="profile rounded-circle"> <img src="{{asset('asset/image/icon-data.png')}}" alt=""></div>
                </div>
                <div class="content">
                        <p class="nama">Rendy Nugraha</p>
                        <p class="jam-pengisian">2 hours ago</p>
                        <p class="isi"><span>Infrastruktur terbaru</span> dimana kita akan menempatkan berberpa kincir air di desa desa dengan
                            debit dan arus air yang memumpuni untuk mengerakan kincir air sehingga bisa di ubah menjadi
                            energi listrik tanpa adanya gas limbah yang di buang ke alam.</p>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="pesan w-50 ">
                                        <div class="input-group mb-3 ">
                                            <button class="btn balas-pesan" type="button" id="button-addon1">
                                                <i class="fa-solid fa-message"></i>
                                            </button>
                                            <input type="text" class="form-control " placeholder="balas pesan" aria-label="balas pesan" aria-describedby="button-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group mb-3 mt-3 ">
                                        <span class="input-group-text rounded-pill" id="basic-addon1">+20 partispan</span>
                                      </div>
                                </div>
                            </div>
                </div>
                </div>
            </div>
        </div>
</div>
    </section>
@endsection
