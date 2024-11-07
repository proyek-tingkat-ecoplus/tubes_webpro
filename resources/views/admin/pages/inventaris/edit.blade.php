@extends('admin.layout.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Data Role /</span> Edit Role</h4>
    <div class="card">
        <div class="container pe-3 ps-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <form class="forms">
                        @method('put')
                        <div
                            class="form-group mt-2
                        @if ($errors->has('name')) has-error @endif">
                            <label for="name">Nama Role</label>
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
                            <label for="description">Deskripsi Role</label>
                            <input type="description" name="description" class="form-control" value="{{ old('description') }}">
                            @if ($errors->has('description'))
                                <span
                                    class="help-block
                                @if ($errors->has('description')) has-error @endif">
                                    {{ $errors->first('description') }}
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
                            <a href="/pages/inventaris" class="btn btn-danger mt-3">Kembali</a>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="text" hidden value="{{ $id }}" id="idx">
    <input type="text" hidden value="{{ asset('asset/admin/json/inventaris.json') }}" id="path">
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
                        $('input[name="name"]').val(dataById.name)
                        $('input[name="description"]').val(dataById.description)
                        $('select[name="status"]').val(dataById.status).change()
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
                form.append('name', $('input[name="name"]').val());
                form.append('description', $('input[name="description"]').val());
                form.append('status', $('select[name="status"]').val());
                form.append('_method', 'PATCH'); // kalau patch harus make ini
                form.append('_token', $('meta[name="csrf_token"]').attr('content')); // CSRF token

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                    },
                    url: "/api/inventaris/" + id + "/edit",
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: form,
                    success: function(data) {
                        console.log(data);
                        window.location = "{{ url('pages/inventaris') }}"

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
