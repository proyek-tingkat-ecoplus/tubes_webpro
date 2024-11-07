@extends('admin.layout.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Data Forum /</span> Edit Forum</h4>
    <div class="card">
        <div class="container pe-3 ps-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <form class="forms">
                        @method('put')
                        <div
                            class="form-group mt-2
                        @if ($errors->has('author')) has-error @endif">
                            <label for="author">author</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author') }}">
                            @if ($errors->has('author'))
                                <span
                                    class="help-block
                                @if ($errors->has('author')) has-error @endif">
                                    {{ $errors->first('author') }}
                                </span>
                            @endif
                        </div>
                        <div
                            class="form-group mt-2
                        @if ($errors->has('tag')) has-error @endif">
                            <label for="tag">tag</label>
                            <input type="tag" name="tag" class="form-control" value="{{ old('tag') }}">
                            @if ($errors->has('tag'))
                                <span
                                    class="help-block
                                @if ($errors->has('tag')) has-error @endif">
                                    {{ $errors->first('tag') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mt-2
                    @if ($errors->has('title')) has-error @endif">
                            <label for="title">title</label>
                            <input type="title" name="title" class="form-control" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span
                                    class="help-block
                            @if ($errors->has('title')) has-error @endif">
                                    {{ $errors->first('title') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mt-2
                @if ($errors->has('content')) has-error @endif">
                            <label for="content">content</label>
                            <input type="content" name="content" class="form-control" value="{{ old('content') }}">
                            @if ($errors->has('content'))
                                <span
                                    class="help-block
                        @if ($errors->has('content')) has-error @endif">
                                    {{ $errors->first('content') }}
                                </span>
                            @endif
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
                        $('input[name="content"]').val(dataById.content)
                    }
                },
                error: function(jqxhr, textStatus, error) {
                    var err = textStatus + ", " + error;
                    console.log("Initial Request Failed: " + err);
                }
            });

            $('.forms').submit(function(e) {
                console.log("here")
                e.preventDefault();
                var form = new FormData(this);
                form.append('id', id);
                form.append('author', $('input[name="author"]').val());
                form.append('tag', $('input[name="tag"]').val());
                form.append('title', $('input[name="title"]').val());
                form.append('content', $('input[name="content"]').val());
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
