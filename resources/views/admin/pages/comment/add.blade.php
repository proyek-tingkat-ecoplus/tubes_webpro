@extends('admin.layout.master')
@section('title', 'Comment')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">FORMULIR / Data Comment /</span> Tambah Comment</h4>
<div class="card">
    <div class="container pe-3 ps-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" class="form">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="author">Name</label>
                        <input type="text" name="author" class="form-control" value="{{ old('author') }}">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="comment">Comment</label>
                        <textarea name="comment" class="form-control" rows="3">{{ old('comment') }}</textarea>
                        <span class="invalid-feedback"></span>
                    </div>

                    <div class="text-start">
                        <a href="/pages/comment" class="btn btn-danger mt-3">Kembali</a>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="text" hidden value="{{ asset('asset/admin/json/comment.json') }}" id="path">
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    var path = document.getElementById('path').value;
    var lastId = 0;
    $.ajax({
        url: path,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.data && data.data.length > 0) {
                lastId = data.data[data.data.length - 1].id;
            }
        },
        error: function(jqxhr, textStatus, error) {
            console.error("Initial Request Failed: " + textStatus + ", " + error);
        }
    });

    var validation = () => {
        let isValid = true;
        $('input, textarea').removeClass('is-invalid');
        const author = $('input[name="author"]');
        if (!author.val()) {
            author.addClass('is-invalid');
            author.next().text('Name is required');
            isValid = false;
        }
        const comment = $('textarea[name="comment"]');
        if (!comment.val()) {
            comment.addClass('is-invalid');
            comment.next().text('Comment is required');
            isValid = false;
        }

        return isValid;
    };

    $('.form').submit(function(e) {
        e.preventDefault();
        if (!validation()) return;
        var form = new FormData(this);
        form.append('id', parseInt(lastId) + 1);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
            },
            url: "/api/comment/add",
            type: 'POST',
            processData: false,
            contentType: false,
            data: form,
            success: function(data) {
                console.log(data);
                window.location = "{{ url('pages/comment') }}";
            },
            error: function(jqxhr, textStatus, error) {
                console.error("Request Failed: " + textStatus + ", " + error);
            }
        });
    });
});
</script>
@endpush
