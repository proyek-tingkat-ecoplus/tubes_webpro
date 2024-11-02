@extends('admin.layout.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Data Pengguna /</span> Edit Pengguna</h4>
    <div class="card">
        <div class="container pe-3 ps-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <form class="forms">
                        @method('put')
                        <div
                            class="form-group mt-2
                        @if ($errors->has('name')) has-error @endif">
                            <label for="name">Name</label>
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
                        @if ($errors->has('email')) has-error @endif">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span
                                    class="help-block
                                @if ($errors->has('email')) has-error @endif">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div
                            class="form-group mt-2
                        @if ($errors->has('password')) has-error @endif">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                            @if ($errors->has('password'))
                                <span
                                    class="help-block
                                @if ($errors->has('password')) has-error @endif">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                        <div
                            class="form-group mt-2
                        @if ($errors->has('password_confirmation')) has-error @endif">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            @if ($errors->has('password_confirmation'))
                                <span
                                    class="help-block
                                @if ($errors->has('password_confirmation')) has-error @endif">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                            @endif
                        </div>
                        <div
                            class="form-group mt-2
                        @if ($errors->has('role')) has-error @endif">
                            <label for="role">Peran</label>
                            <select name="role" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            @if ($errors->has('role'))
                                <span
                                    class="help-block
                                @if ($errors->has('role')) has-error @endif">
                                    {{ $errors->first('role') }}
                                </span>
                            @endif
                        </div>
                        <div
                            class="form-group mt-2
                    @if ($errors->has('status')) has-error @endif">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="aktif">Aktif</option>
                                <option value="Non Aktif">Non active</option>
                            </select>
                            @if ($errors->has('status'))
                                <span
                                    class="help-block
                            @if ($errors->has('status')) has-error @endif">
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
    <input type="text" hidden value="{{ $id }}" id="idx">
    <input type="text" hidden value="{{ asset('asset/admin/json/user.json') }}" id="path">
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
                        $('input[name="email"]').val(dataById.email)
                        $('select[name="role"]').val(dataById.role).change()
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
                form.append('email', $('input[name="email"]').val());
                form.append('role', $('select[name="role"]').val());
                form.append('status', $('select[name="status"]').val());
                form.append('_method', 'PATCH'); // kalau patch harus make ini
                form.append('_token', $('meta[name="csrf_token"]').attr('content')); // CSRF token

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                    },
                    url: "/api/user/" + id + "/edit",
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: form,
                    success: function(data) {
                        console.log(data);
                        window.location = "{{ url('pages/user') }}"

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
