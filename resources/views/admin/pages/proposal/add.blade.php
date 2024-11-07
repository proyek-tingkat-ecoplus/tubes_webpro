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
                        @if ($errors->has('name')) has-error @endif">
                            <label for="name">name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span
                                    class="help-block
                                @if ($errors->has('name')) has-error @endif">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                        <div
                        class="form-group mt-2
                    @if ($errors->has('description')) has-error @endif">
                        <label for="description">description</label>
                        <input type="description" name="description" type="text" class="form-control" value="{{ old('description') }}">
                        @if ($errors->has('description'))
                            <span
                                class="help-block
                            @if ($errors->has('description')) has-error @endif">
                                {{ $errors->first('description') }}
                            </span>
                        @endif
                    </div>
                        <div
                            class="form-group mt-2
                        @if ($errors->has('file')) has-error @endif">
                            <label for="file">file</label>
                            <input type="file" name="file" type="file" class="form-control" value="{{ old('file') }}">
                            @if ($errors->has('file'))
                                <span
                                    class="help-block
                                @if ($errors->has('file')) has-error @endif">
                                    {{ $errors->first('file') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group mt-2
                        @if($errors->has('status'))
                            has-error
                        @endif">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Non active</option>
                            </select>
                            @if($errors->has('status'))
                            <span class="help-block
                                @if($errors->has('status'))
                                    has-error
                                @endif">
                                {{ $errors->first('status') }}
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
    <input type="text" hidden value="{{ asset('asset/admin/json/proposal.json') }}" id="path">
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
                console.log(form);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                    },
                    url: "/api/proposal/add",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: form,
                    success: function(data) {
                        console.log(data);
                        window.location = "{{ url('pages/proposal') }}"
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
