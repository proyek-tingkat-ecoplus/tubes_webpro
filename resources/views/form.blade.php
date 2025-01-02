@extends('main.main')
@section('content')
<img src="{{asset('asset/image/pabrik.jpeg')}}" class="img-fluid img-hero" alt="Responsive image">
<div class="form">
    <section class="pos">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="tambah diskusi baru" aria-label="tambah diskusi baru" aria-describedby="button-addon2">
            <a class="btn search-bar" type="button" id="button-addon2" href="/tambahpesan">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
        @foreach($forums as $forum)
        <div class="post-item rounded-3">
            <h3 class="d-blok mb-3" style="color: white">Infastruktur terbaru</h3>
            <div class="d-flex">
                <div class="profile">
                    <div class="profile rounded-circle"> <img src="{{asset('asset/image/icon-data.png')}}" alt=""></div>
                </div>
                <div class="content">
                    <p class="nama">{{ $forum->name }}</p>
                    <p class="jam-pengisian">{{ $forum->created_at->diffForHumans() }}</p>
                    <p class="isi"><span> Infrastruktur terbaru </span> <br>  {{ $forum->description }}</p>
                </div>
            </div>
        </div>
</div>
@endforeach
    </section>
@endsection
