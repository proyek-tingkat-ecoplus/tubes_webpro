@extends('admin.layout.master')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Data Comment /</span> Edit Comment</h4>
<div class="card">
    <div class="container pe-3 ps-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <form class="forms">
                    @method('put')
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
<input type="text" hidden value="{{ $id }}" id="idx">
<input type="text" hidden value="{{ asset('asset/admin/json/comment.json') }}" id="path">
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        var id = document.getElementById('idx').value;
        var path = document.getElementById('path').value;
        $.ajax({
            url: path,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.data && data.data.length > 0) {
                    dataById = data.data.filter((dt) => parseInt(dt.id) == parseInt(id))[0]
                    $('input[name="author"]').val(dataById.author)
                    $('textarea[name="comment"]').val(dataById.comment)
                }
            },
            error: function (jqxhr, textStatus, error) {
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

        $('.forms').submit(function (e) {
            e.preventDefault();
            if (!validation()) return;
            var form = new FormData(this);
            form.append('id', id);
            form.append('name', $('input[name="author"]').val());
            form.append('comment', $('textarea[name="comment"]').val());
            form.append('_method', 'PATCH'); // kalau patch harus make ini
            form.append('_token', $('meta[name="csrf_token"]').attr('content')); // CSRF token

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                },
                url: "/api/comment/" + id + "/edit",
                method: 'POST',
                processData: false,
                contentType: false,
                data: form,
                success: function (data) {
                    console.log(data);
                    window.location = "{{ url('pages/comment') }}"

                },
                error: function (jqxhr, textStatus, error) {
                    var err = textStatus + ", " + error;
                    console.log("Request Failed: " + err);
                }
            });
        });
    });

</script>
@endpush
