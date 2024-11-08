@extends('admin.layout.master')
@section('title', 'Inventaris')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">INVENTARIS / Data Inventaris /</span> Edit Inventaris</h4>
    <div class="card">
        <div class="container pe-3 ps-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <form class="forms">
                        @method('put')
                        <div class="form-group mt-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="description">Deskripsi Alat</label>
                            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Non Active</option>
                            </select>
                            <span class="invalid-feedback"></span>
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

            var validation = () => {
                let isValid = true;
                $('input, select').removeClass('is-invalid');
                const name = $('input[name="name"]');
                if (!name.val()) {
                    name.addClass('is-invalid');
                    name.next().text('Name is required');
                    isValid = false;
                }
                const description = $('input[name="description"]');
                if (!description.val()) {
                    description.addClass('is-invalid');
                    description.next().text('Description is required');
                    isValid = false;
                }

                const status = $('select[name="status"]');
                if (!status.val()) {
                    status.addClass('is-invalid');
                    status.next().text('Status is required');
                    isValid = false;
                }

                return isValid;
            };

            $('.forms').submit(function(e) {
                e.preventDefault();
                if (!validation()) return;
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
