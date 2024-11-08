@extends('admin.layout.master')
@section('title', 'Forum')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forumulir / Data Forum /</span> Edit Forum</h4>
    <div class="card">
        <div class="container pe-3 ps-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <form class="forms">
                        @method('put')
                        <div class="form-group mt-2">
                            <label for="author">Author</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author') }}">
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group mt-2">
                            <label for="tag">Tag</label>
                            <input type="text" name="tag" class="form-control" value="{{ old('tag') }}">
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group mt-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group mt-2">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" rows="4">{{ old('content') }}</textarea>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="text-start">
                            <a href="/pages/forum" class="btn btn-danger mt-3">Kembali</a>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="text" hidden value="{{ $id }}" id="idx">
    <input type="text" hidden value="{{ asset('asset/admin/json/forum.json') }}" id="path">
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var id = document.getElementById('idx').value;
            var path = document.getElementById('path').value;
            $.ajax({
                url: path,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.data && data.data.length > 0) {
                        dataById = data.data.filter((dt) => parseInt(dt.id) == parseInt(id))[0]
                        $('input[name="author"]').val(dataById.author)
                        $('input[name="tag"]').val(dataById.tag)
                        $('input[name="title"]').val(dataById.title)
                        $('textarea[name="content"]').val(dataById.content)
                    }
                },
                error: function(jqxhr, textStatus, error) {
                    var err = textStatus + ", " + error;
                    console.log("Initial Request Failed: " + err);
                }
            });

            var validation = () => {
            let isValid = true;
            $('input, textarea').removeClass('is-invalid');
            const author = $('input[name="author"]');
            if (!author.val()) {
                author.addClass('is-invalid');
                author.next().text('Author is required');
                isValid = false;
            }
            const tag = $('input[name="tag"]');
            if (!tag.val()) {
                tag.addClass('is-invalid');
                tag.next().text('Tag is required');
                isValid = false;
            }
            const title = $('input[name="title"]');
            if (!title.val()) {
                title.addClass('is-invalid');
                title.next().text('Title is required');
                isValid = false;
            }
            const content = $('textarea[name="content"]');
            if (!content.val()) {
                content.addClass('is-invalid');
                content.next().text('Content is required');
                isValid = false;
            }

            return isValid;
        };


            $('.forms').submit(function(e) {
                e.preventDefault();
                if (!validation()) return;
                var form = new FormData(this);
                form.append('id', id);
                form.append('author', $('input[name="author"]').val());
                form.append('tag', $('input[name="tag"]').val());
                form.append('title', $('input[name="title"]').val());
                form.append('content', $('textarea[name="content"]').val());
                form.append('_method', 'PATCH'); // kalau patch harus make ini
                form.append('_token', $('meta[name="csrf_token"]').attr('content')); // CSRF token

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                    },
                    url: "/api/forum/" + id + "/edit",
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: form,
                    success: function(data) {
                        console.log(data);
                        window.location = "{{ url('pages/forum') }}"

                    },
                    error: function(jqxhr, textStatus, error) {
                        var err = textStatus + ", " + error;
                        console.log("Request Failed: " + err);
                    }
                });
            });
        });


    </script>
@endpush
