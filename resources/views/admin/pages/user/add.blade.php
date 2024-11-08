@extends('admin.layout.master')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Data Pengguna /</span> Tambah</h4>
<div class="card">
    <div class="container pe-3 ps-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST" class="form">
                    @csrf
                    <div class="form-group mt-2 ">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control " value="">
                        <span class="invalid-feedback">
                        </span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="role">Peran</label>
                        <select name="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="admin">Aktif</option>
                            <option value="user">Non active</option>
                        </select>
                        <span class="invalid-feedback"></span>
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
<input type="text" hidden value="{{asset('asset/admin/json/user.json')}}" id="path">
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

var validation = () => {
    console.log('validation');
    $('input, select').removeClass('is-invalid');
    let isValid = true;
    const name = $('input[name="name"]');
    if (!name.val()) {
        name.addClass('is-invalid');
        name.next().text('Name is required');
        isValid = false;
    }
    const email = $('input[name="email"]');
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.val() || !emailPattern.test(email.val())) {
        email.addClass('is-invalid');
        email.next().text('Email is required');
        isValid = false;
    }
    const password = $('input[name="password"]');
    if (!password.val()) {
        password.addClass('is-invalid');
        password.next().text('Password is required');
        isValid = false;
    }
    const passwordConfirmation =  $('input[name="password_confirmation"]');
    if (!passwordConfirmation.val() || passwordConfirmation.val() !== password.val()) {
        passwordConfirmation.addClass('is-invalid');
        passwordConfirmation.next().text('Password confirmation is required');
        isValid = false;
    }
    const role = $('select[name="role"]');
    if (!role.val()) {
        role.addClass('is-invalid');
        role.next().text('Role is required');
        isValid = false;
    }
    const status = $('select[name="status"]');
    if (!status.val()) {
        status.addClass('is-invalid');
        status.next().text('Status is required');
        isValid = false;
    }

    console.log(isValid);
    return isValid;
}
$('.form').submit(function (e) {
    e.preventDefault();

    if(validation() === false) {
        return;
    }

    var form = new FormData(this);
    form.append('id', parseInt(lastId) + 1);
    // var name = form.get('name');
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
    },
        url: "/api/user/add",
        type: 'POST',
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            console.log(data);
            window.location = "{{ url('pages/user') }}"
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
