@extends('admin.layout.master')
@section('title', 'Proposal')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">PRPOSAL / Data Proposal /</span> Tambah Proposal</h4>
    <div class="card">
        <div class="container pe-3 ps-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="file">File</label>
                            <input type="file" name="file" class="form-control">
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
                            <a href="/pages/proposal" class="btn btn-danger mt-3">Kembali</a>
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

    // AJAX Request to Get Last ID
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
        const file = $('input[name="file"]');
        if (!file.val()) {
            file.addClass('is-invalid');
            file.next().text('File is required');
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

    $('.form').submit(function(e) {
        e.preventDefault();
        if (!validation()) return;
        var form = new FormData(this);
        form.append('id', parseInt(lastId) + 1);

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
                window.location = "{{ url('pages/proposal') }}";
            },
            error: function(jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.error("Request Failed: " + err);
            }
        });
    });
});
</script>
@endpush
