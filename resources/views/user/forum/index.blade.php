@extends('user.master.master')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- HERO SECTION -->
<div class="d-flex align-items-center" style="background: url('asset/image/pabrik.jpeg') center center/cover no-repeat; height: 600px; background-color: rgba(0,0,0,0.6); background-blend-mode: darken;">
    <div class="container" style="padding-top: 200px;">
        <h1 class="text-white fw-bold" style="font-size: 3rem;">Forum Kepala Desa</h1>
        <p class="text-white" style="font-size: 1.25rem;">Diskusi, informasi, dan kolaborasi antar Kepala Desa</p>
    </div>
</div>

<div class="py-5" style="background-color: #f7f9fb;">
    <div class="container">
        <div class="row g-5">
            <!-- Kolom Utama -->
            <div class="col-lg-8">

                <!-- Tombol Buat Post -->
                <div class="mb-4">
                    <a href="{{ route('forums.create') }}" class="btn shadow-sm" style="background-color: #003030; color: white;">
                        <i class="fas fa-pen me-2" style="color:white"></i> Buat Post Baru
                    </a>
                </div>


                @foreach ($forums as $forum)
                <div class="card mb-4 shadow-sm rounded-4 border-0">
                    <div class="card-body">

                        <!-- Header -->
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset($forum->user->photo ?? 'image/profile/default.png') }}" class="rounded-circle" alt="User Avatar" style="width: 40px; height: 40px; object-fit: cover;">
                            <div class="ms-3">
                                <div class="fw-bold">{{ $forum->guest_author ?? $forum->user->user_details->first_name ?? $forum->user->username ?? "Guest" }}</div>
                                <small class="text-muted">{{ $forum->created_at->diffForHumans() }} &middot; {{ $forum->user->role->name ?? "Guest" }}</small>
                            </div>

                            <div class="ms-auto dropdown">
                                <button class="btn btn-sm btn-light rounded-circle" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('forum.edit', $forum->id) }}">
                                        <i class="fas fa-edit me-2 text-warning"></i>Edit</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('forums.destroy', $forum->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus post ini?')" class="dropdown-item">
                                                <i class="fas fa-trash me-2 text-danger"></i>Hapus
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Isi Post -->
                        <h5 class="fw-bold">{{ $forum->name }}</h5>
                        <p class="text-muted">{!! Str::limit(strip_tags($forum->description), 250) !!}</p>

                        <!-- Footer -->
                        <div class="d-flex align-items-center mt-3">
                            <button class="btn btn-outline-secondary btn-sm me-2 toggle-comments">
                                <i class="fas fa-comments me-1"></i> {{ $forum->comments->count() }} Komentar
                            </button>

                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-share-alt me-1"></i> Bagikan
                                </button>
                                <ul class="dropdown-menu">
                                    @php
                                    $shareLinks = Share::page(URL::current(), 'share text')
                                    ->facebook()
                                    ->twitter()
                                    ->whatsapp()
                                    ->getRawLinks();
                                    @endphp

                                    <li><a class="dropdown-item" href="{{ htmlspecialchars($shareLinks['facebook']) }}"><i class="fab fa-facebook text-primary me-2"></i>Facebook</a></li>
                                    <li><a class="dropdown-item" href="{{ htmlspecialchars($shareLinks['twitter']) }}"><i class="fab fa-twitter text-info me-2"></i>Twitter</a></li>
                                    <li><a class="dropdown-item" href="{{ htmlspecialchars($shareLinks['whatsapp']) }}"><i class="fab fa-whatsapp text-success me-2"></i>WhatsApp</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Section Komentar -->
                        <div class="comment-section mt-4 d-none">
                            <!-- Form Komentar -->

                            <div class="d-flex mb-3 comment-form">
                                <img src="{{ asset($forum->user->image ?? 'image/profile/default.png') }}" class="rounded-circle me-2" alt="User Avatar"
                                    style="width: 32px; height: 32px;">
                                <div class="flex-grow-1">
                                    <form action="{{ route('forum.comment', $forum->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <input type="text" name="user_id" id="user_id" hidden>
                                        <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" rows="2"
                                        placeholder="Tulis komentar Anda..."></textarea>
                                        @error('comment')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    <button class="btn btn-sm btn-primary mt-2">
                                        <i class="fas fa-paper-plane me-1"></i>Kirim
                                    </button>
                                    </form>
                                </div>
                            </div>
                            @foreach ($forum->comments as $comment)
                            <!-- Daftar Komentar -->
                            <div class="comments-list">
                                <!-- Komentar 1 -->
                                <div class="d-flex mt-3">
                                    <img src="{{ asset($comment->user->photo) }}" class="rounded-circle me-2"
                                        alt="User Avatar" style="width: 32px; height: 32px;">
                                    <div class="flex-grow-1 bg-light rounded p-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">Budi Santoso</h6>
                                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-0">{{ $comment->content }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                @endforeach

                {{ $forums->links() }}

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 80px;">
                    <!-- Kategori -->
                    <div class="card shadow-sm mb-4 border-0 rounded-4">
                        <div class="card-header text-white rounded-top-4" style="background-color: #003030">
                            <h5 class="mb-0"><i class="fas fa-folder-open me-2"></i> Kategori Diskusi</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
                                    Administrasi Desa <span class="badge" style="background-color: #003030" >14</span>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
                                    Pembangunan Desa <span class="badge" style="background-color: #003030" >23</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Post Populer -->
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-header text-white rounded-top-4" style="background-color: #003030">
                            <h5 class="mb-0"><i class="fas fa-fire me-2"></i> Post Terpopuler</h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @foreach ($mostCommented as $post)
                                <a href="#" class="list-group-item list-group-item-action">
                                    <h6 class="mb-1 fw-bold">{{ $post->name }}</h6>
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small><br>
                                    <small class="text-muted"><i class="fas fa-comments me-1"></i>{{ $post->comments_count }} komentar</small>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@vite('resources/js/pages/user/forum.js')

<style>
    .toggle-comments {
        transition: all 0.3s;
    }

    .toggle-comments:hover {
        background-color: #d9edf7;
        border-color: #bce8f1;
    }

    .comment-section {
        border-top: 1px solid #e0e0e0;
        padding-top: 1rem;
    }

    .sticky-top {
        z-index: 10;
    }
</style>
@endsection
