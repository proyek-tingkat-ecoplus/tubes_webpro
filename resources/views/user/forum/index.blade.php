@extends('user.master.master')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="py-5" style="background-color: #f7f9fb;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Forum Kepala Desa</h2>
            <p class="text-muted">Diskusi, informasi, dan kolaborasi antar Kepala Desa se-Indonesia</p>
        </div>

        <div class="row g-5">
            <!-- Kolom Utama -->
            <div class="col-lg-8">

                <!-- Tombol Buat Post -->
                <div class="mb-4">
                    <a href="{{ route('forums.create') }}" class="btn w-100 shadow-sm">
                        <i class="fas fa-pen me-2"></i> Buat Post Baru
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

                        <!-- Komentar -->
                        <div class="comment-section d-none mt-4">
                            <div class="d-flex align-items-start mb-3">
                                <img src="{{ asset($forum->user->photo ?? 'image/profile/default.png') }}" class="rounded-circle" alt="User Avatar" style="width: 32px; height: 32px;">
                                <div class="ms-3 w-100">
                                    <form action="{{ route('forum.comment', $forum->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <textarea class="form-control" name="comment" rows="2" placeholder="Tulis komentar..."></textarea>
                                        <button class="btn btn-primary btn-sm mt-2"><i class="fas fa-paper-plane me-1"></i>Kirim</button>
                                    </form>
                                </div>
                            </div>

                            @foreach ($forum->comments as $comment)
                            <div class="d-flex align-items-start mb-3">
                                <img src="{{ asset($comment->user->photo ?? 'image/profile/default.png') }}" class="rounded-circle" alt="User Avatar" style="width: 32px; height: 32px;">
                                <div class="ms-3 bg-light rounded p-3 w-100">
                                    <div class="d-flex justify-content-between mb-1">
                                        <strong>{{ $comment->user->user_details->first_name ?? 'Anonim' }}</strong>
                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-0">{{ $comment->content }}</p>
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
                        <div class="card-header bg-success text-white rounded-top-4">
                            <h5 class="mb-0"><i class="fas fa-folder-open me-2"></i> Kategori Diskusi</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
                                    Administrasi Desa <span class="badge bg-success">14</span>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
                                    Pembangunan Desa <span class="badge bg-success">23</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Post Populer -->
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-header bg-success text-white rounded-top-4">
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
