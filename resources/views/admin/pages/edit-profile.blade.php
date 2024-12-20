@extends('admin.layout.master')
@section('title', 'Edit Profile')
@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
                <form action="user/edit" method="POST" class="form">
                    @csrf
                    <!-- Input for Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name')
                            is-invalid
                        @enderror" id="dash-name" name="name" placeholder="Enter your name">
                        @error('name')
                            <div class="invalid-validated">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input for Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email')
                            is-invalid
                        @enderror" id="dash-email" name="email" placeholder="Enter your email">
                        @error('email')
                            <div class="invalid-validated">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input for Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password baru</label>
                        <input type="password" class="form-control @error('password')
                            is-invalid
                        @enderror" id="dash-password" name="password" placeholder="Enter new password">
                        @error('password')
                            <div class="invalid-validated">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input for Password Confirmation -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control @error('password_confirmation')
                            is-invalid
                        @enderror" id="dash-password_confirmation" name="password_confirmation" placeholder="Confirm your password">
                        @error('password_confirmation')
                            <div class="invalid-validated">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="text"  id="dash-id" name="user_id" hidden >

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
