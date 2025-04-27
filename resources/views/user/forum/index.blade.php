@extends('user.master.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="section-230 hero-1">
    <div class="text-center default-title mb-5">
        Forum Kepala Desa
    </div>
    <div class="container">
        <div class="row">
            <!-- Kolom Utama -->
            <div class="col-md-8">
                <!-- Tombol Buat Post -->
                <a href="{{ route('forums.create') }}" class="btn btn-primary mb-4 w-100 btn-post">
                    <i class="fas fa-plus me-2"></i>Buat Post Baru
                </a>


                @foreach ($forums as $forum)
                <!-- Contoh Post 1 -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <!-- Header Post -->
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset($forum->user->photo ?? 'image/profile/default.png') }}" class="rounded-circle me-2" alt="User Avatar" style="width: 32px; height: 32px;">
                            <div>
                                <h6 class="mb-0">{{ $forum->guest_author ?? $forum->user->user_details->first_name ?? $forum->user->username ?? "Guest"  }}</h6>
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i>{{ $forum->created_at->diffForHumans() }}
                                    <i class="fas fa-tag me-1"></i>{{ $forum->user->role->name ?? "Guest" }}
                                </small>
                            </div>
                            <div class="btn-group ms-auto btn-action" data-user="{{ $forum->user->id ?? 0}}">
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown">

                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('forum.edit', $forum->id) }}">
                                            <i class="fa fa-pencil text-warning me-2"></i>Edit
                                        </a></li>
                                    <li>
                                        <form action="{{ route('forums.destroy', $forum->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  onclick="return confirm('Yakin ingin menghapus post ini?')" class="dropdown-item" >
                                                <i class="fa fa-trash text-danger me-2"></i>Hapus
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Konten Post -->
                        <h5>{{ $forum->name }}</h5>
                        <p class="text-secondary">
                            {!! $forum->description !!}
                        </p>

                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div>
                                <!-- Tombol Toggle Komentar -->
                                <button class="btn btn-sm btn-outline-secondary me-2 toggle-comments">
                                    <i class="fas fa-comment me-1"></i><span>{{ $forum->comments->count() }}</span> Komentar
                                </button>

                                <!-- Dropdown Share -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown">
                                        <i class="fas fa-share me-1"></i>Bagikan
                                    </button>
                                    <ul class="dropdown-menu">
                                        @php
                                        // Fetch all share links as an array
                                            $shareLinks = Share::page(URL::current(), 'share text')
                                            ->facebook()
                                            ->twitter()
                                            ->whatsapp()
                                            ->getRawLinks();
                                        @endphp

                                        <li>
                                            <a class="dropdown-item" href="{{ htmlspecialchars($shareLinks['facebook']) }}">
                                            <i class="fab fa-facebook text-primary me-2"></i>Facebook
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ htmlspecialchars($shareLinks['twitter']) }}">
                                            <i class="fab fa-twitter text-info me-2"></i>Twitter
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ htmlspecialchars($shareLinks['whatsapp']) }}">
                                            <i class="fab fa-whatsapp text-success me-2"></i>WhatsApp
                                            </a>
                                        </li>
                                    </ul>
                                </div>
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

            <!-- Sidebar Kategori -->
            <div class="col-md-4">
                <!-- Widget Kategori -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header" style="background-color: var(--dark-green);">
                        <h5 class="mb-0 text-white">
                            <i class="fas fa-folder-open me-2"></i>Kategori Diskusi
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Administrasi Desa
                                <span class="badge rounded-pill" style="background-color: var(--light-green);">14</span>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Pembangunan Desa
                                <span class="badge rounded-pill" style="background-color: var(--light-green);">23</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Widget Post Populer -->
                <div class="card shadow-sm">
                    <div class="card-header" style="background-color: var(--dark-green);">
                        <h5 class="mb-0 text-white">
                            <i class="fas fa-fire me-2"></i>Post Terpopuler
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                        @foreach ($mostCommented as $post)
                            <!-- Post Populer 1 -->
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $post->name }}</h6>
                                    <small>{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                                <small class="text-muted"><i class="fas fa-comment me-1"></i>{{ $post->comments_count }} Komentar</small>
                            </a>
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Toggle Komentar


</script>
@vite('resources/js/pages/user/forum.js')
<style>
    .comment-section {
        border-top: 1px solid var(--light-grey);
        padding-top: 1rem;
    }

    .list-group-item-action:hover {
        background-color: var(--light-grey);
    }

    .badge {
        background-color: var(--light-green) !important;
    }

</style>
@endsection
