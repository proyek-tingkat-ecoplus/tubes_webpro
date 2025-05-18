@extends('user.master.master')
@push('styles')
<script src="https://cdn.tiny.cloud/1/9suqmd6ssszbldxcj50q6eyaifmmf80g2x8u9ih0o6vhxyqt/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>
@endpush
@section('content')
<div class="section-230 hero-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header" style="background-color: var(--dark-green); color: white;">
                        <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Buat Postingan Baru</h4>
                    </div>

                    <div class="card-body">
                        <form id="createForumForm" action="{{ route('forum.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="postTitle" class="form-label fw-bold">Penulis</label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror" id="postAuthor"
                                name="author"
                                    placeholder="Masukkan Penulis postingan" required>
                                <input type="text" name="user" hidden>
                                @error('author')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Judul Postingan -->
                            <div class="mb-4">
                                <label for="postTitle" class="form-label fw-bold">Judul Postingan</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="postTitle" name="title"
                                    placeholder="Masukkan judul postingan" >
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kategori -->
                            {{-- <div class="mb-4">
                                <label for="postCategory" class="form-label fw-bold">Pilih Kategori</label>
                                <select class="form-select" id="postCategory" name="category" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="administrasi">Administrasi Desa</option>
                                    <option value="infrastruktur">Infrastruktur</option>
                                    <option value="keuangan">Keuangan Desa</option>
                                    <option value="laporan">Laporan Masyarakat</option>
                                </select>
                            </div> --}}

                            <!-- Konten Postingan -->
                            <div class="mb-4">
                                <label for="postContent" class="form-label fw-bold">Isi Postingan</label>
                                <textarea class="form-control" id="postContent" name="content @error('content')
                                    is-invalid
                                @enderror " rows="8"
                                    placeholder="Tulis isi postingan Anda disini..."></textarea>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <a href="/forum" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-primary mb-2">
                                    <i class="fas fa-paper-plane me-2"></i>Publikasikan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-label {
        color: var(--dark-blue);
        font-size: 1.1rem;
    }

    .form-control,
    .form-select {
        border: 2px solid var(--light-green);
        border-radius: 8px;
        padding: 12px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--dark-green);
        box-shadow: 0 0 0 0.25rem rgba(15, 76, 117, 0.25);
    }

</style>
@vite('resources/js/pages/user/forum.js')
{{-- <script>
    // Validasi form sederhana
    tinymce.init({
        selector: 'textarea',
        plugins: [
            // Core editing features
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media',
            'searchreplace', 'table', 'visualblocks', 'wordcount',
            // Your account includes a free trial of TinyMCE premium features

            // Try the most popular premium features until Mar 23, 2025:
            'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker',
            'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage',
            'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags',
            'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',

        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
            'See docs to implement AI Assistant')),
    });

</script> --}}
@endsection



