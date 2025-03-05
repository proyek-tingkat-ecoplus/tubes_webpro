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
            <h3 class="d-blok mb-3" style="color: white">Infastruktur terbaru </h3>
            <div class="d-flex">
                <div class="profile">
                    <div class="profile rounded-circle"> <img src="{{asset('asset/image/icon-data.png')}}" alt=""></div>
                </div>
                <div class="content">
                    <p class="nama">{{ $forum->name }}</p>
                    <p class="jam-pengisian">{{ $forum->created_at->diffForHumans() }}</p>
                    <p class="isi"><span> Infrastruktur terbaru    </span> <br>  {{ $forum->description }}</p>
                    <div class="row">
                        <div class="col-md-1">
                            {!! Share::page(URL::current(),'share facebook')->facebook() !!}
                        </div>
                        <div class="col-md-1">
                            {!! Share::page(URL::current(),'share twitter')->twitter() !!}
                        </div>
                        <div class="col-md-1">
                            {!! Share::page(URL::current(),'share reddit')->reddit() !!}
                        </div>
                        <div class="col-md-1">
                            {!! Share::page(URL::current(),'share Telegram')->Telegram() !!}
                        </div>
                    </div>
                    <form action="{{route('forums.destroy', $forum['id'])}}" method="POST">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger mt-4 me-5">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
</div>
@endforeach
    </section>
@endsection
