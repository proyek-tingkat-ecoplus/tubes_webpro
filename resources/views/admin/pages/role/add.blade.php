@extends('admin.layout.master')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Data Role /</span> Tambah</h4>
<div class="card">
    <div class="container pe-3 ps-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST" class="form">
                    @csrf
                    <div class="form-group mt-2
                        @if($errors->has('name'))
                            has-error
                        @endif">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <span class="help-block
                                @if($errors->has('name'))
                                    has-error
                                @endif">
                            {{ $errors->first('name') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group mt-2
                        @if($errors->has('description'))
                            has-error
                        @endif">
                        <label for="description">Deskripsi Role</label>
                        <input type="description" name="description" class="form-control" value="{{ old('description') }}">
                        @if($errors->has('description'))
                        <span class="help-block
                                @if($errors->has('description'))
                                    has-error
                                @endif">
                            {{ $errors->first('description') }}
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
<input type="text" hidden value="{{asset('asset/admin/json/role.json')}}" id="path">
@endsection
@push('scripts')
<script>
$(document).ready(function(){
    var path = document.getElementById('path').value;
    var lastId = 0;
$.ajax({
    url: path,
    type: 'GET',
    dataType: 'json',
    success: function (data) {
        if (data.data && data.data.length > 0) {
            lastId = data.data[data.data.length - 1].id;
        }
    },
    error: function (jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        console.log("Initial Request Failed: " + err);
    }
});

$('.form').submit(function (e) {
    e.preventDefault();
    var form = new FormData(this);
    form.append('id', parseInt(lastId) + 1);
    // var name = form.get('name');
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
    },
        url: "/api/role/add",
        type: 'POST',
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            console.log(data);
            window.location = "{{ url('pages/role') }}"
        },
        error: function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        }
    });
});
})
</script>

@endpush
