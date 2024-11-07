@extends('admin.layout.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Data Forum /</span> Tambah Forum</h4>
    <div class="card">
        <div class="container pe-3 ps-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST" class="form">
                        @csrf
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
                            <a href="/pages/user" class="btn btn-danger mt-3">Kembali</a>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="text" hidden value="{{ asset('asset/admin/json/forum.json') }}" id="path">
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
                    var err = textStatus + ", " + error;
                    console.log("Initial Request Failed: " + err);
                }
            });

            $('.form').submit(function(e) {
                e.preventDefault();
                var form = new FormData(this);
                form.append('id', parseInt(lastId) + 1);
                // var name = form.get('name');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                    },
                    url: "/api/forum/add",
                    type: 'POST',
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
        })
    </script>
@endpush
