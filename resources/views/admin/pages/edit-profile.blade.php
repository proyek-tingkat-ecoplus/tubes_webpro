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
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>

                    <!-- Input for Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>

                    <!-- Input for Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password baru</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                    </div>
                    <input type="text" id="user_id" name="user_id" >

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="module" src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.js"></script>
@endpush
