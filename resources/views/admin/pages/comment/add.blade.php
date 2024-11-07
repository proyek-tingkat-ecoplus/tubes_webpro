@extends('admin.layout.master')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Data Role /</span> Tambah</h4>
<div class="card">
    <div class="container pe-3 ps-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <form  method="POST" class="form">
                    @csrf
                    <div class="form-group mt-2
                        @if($errors->has('author'))
                            has-error
                        @endif">
                        <label for="author">Name</label>
                        <input type="text" name="author" class="form-control" value="{{ old('author') }}">
                        @if($errors->has('author'))
                        <span class="help-block
                                @if($errors->has('author'))
                                    has-error
                                @endif">
                            {{ $errors->first('author') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group mt-2
                        @if($errors->has('comment'))
                            has-error
                        @endif">
                        <label for="comment">Comment</label>
                        <input type="comment" name="comment" class="form-control" value="{{ old('comment') }}">
                        @if($errors->has('comment'))
                        <span class="help-block
                                @if($errors->has('comment'))
                                    has-error
                                @endif">
                            {{ $errors->first('comment') }}
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
<input type="text" hidden value="{{asset('asset/admin/json/comment.json')}}" id="path">
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
        url: "/api/comment/add",
        type: 'POST',
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
})
</script>

@endpush
