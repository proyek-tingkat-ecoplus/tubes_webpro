@extends('admin.layout.master')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Umum dan Akun</h4>

<!-- Card Akun -->
<div class="card">
    <div class="container pe-3 ps-3 pb-3">
        <form action="" method="POST" class="form">
            @csrf
            <!-- Info Personal -->
            <div class="form-group mt-4">
                <h4>Info Personal</h4>
            </div>
            <div class="form-group mt-2 @if($errors->has('name')) has-error @endif">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', 'Rohman') }}">
                @if($errors->has('name'))
                    <span class="help-block @if($errors->has('name')) has-error @endif">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
            <div class="form-group mt-2 @if($errors->has('email')) has-error @endif">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', 'admin@gmail.com') }}">
                @if($errors->has('email'))
                    <span class="help-block @if($errors->has('email')) has-error @endif">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
            <div class="form-group mt-2 @if($errors->has('dob')) has-error @endif">
                <label for="dob">Tanggal Lahir</label>
                <input type="date" name="dob" class="form-control" value="{{ old('dob', '1971-01-31') }}">
                @if($errors->has('dob'))
                    <span class="help-block @if($errors->has('dob')) has-error @endif">
                        {{ $errors->first('dob') }}
                    </span>
                @endif
            </div>
            <div class="form-group mt-2 @if($errors->has('phone')) has-error @endif">
                <label for="phone">Nomor Telepon</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', '+62 812 3456 7890') }}">
                @if($errors->has('phone'))
                    <span class="help-block @if($errors->has('phone')) has-error @endif">
                        {{ $errors->first('phone') }}
                    </span>
                @endif
            </div>
            <div class="form-group mt-2 @if($errors->has('branch')) has-error @endif">
                <label for="branch">Kantor Cabang ESDM</label>
                <select name="branch" class="form-control">
                    <option value="ESDM Provinsi Jawa Barat" {{ old('branch') == 'ESDM Provinsi Jawa Barat' ? 'selected' : '' }}>ESDM
                        Provinsi Jawa Barat</option>
                </select>
                @if($errors->has('branch'))
                    <span class="help-block @if($errors->has('branch')) has-error @endif">
                        {{ $errors->first('branch') }}
                    </span>
                @endif
            </div>


            <!-- Alamat -->
            <div class="form-group mt-4">
                <h4>Alamat</h4>
            </div>
            <div class="form-group mt-2 @if($errors->has('address')) has-error @endif">
                <label for="address">Alamat Lengkap</label>
                <input type="text" name="address" class="form-control"
                    value="{{ old('address', 'Jl. Merdeka No. 15, Kel. Dago, Kec. Coblong, Kota Bandung, Jawa Barat') }}">
                @if($errors->has('address'))
                    <span class="help-block @if($errors->has('address')) has-error @endif">
                        {{ $errors->first('address') }}
                    </span>
                @endif
            </div>

            <div class="form-group mt-2 @if($errors->has('postal_code')) has-error @endif">
                <label for="postal_code">Kode Pos</label>
                <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code', '40135') }}">
                @if($errors->has('postal_code'))
                    <span class="help-block @if($errors->has('postal_code')) has-error @endif">
                        {{ $errors->first('postal_code') }}
                    </span>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="text-start">
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Card Pengaturan Umum -->
<div class="card mt-4">
    <div class="container pe-3 ps-3 pb-3">
        <form action="" method="POST" class="form">
            @csrf
            <div class="form-group mt-4">
                <h4>Bahasa</h4>
                <select class="form-control" name="language" id="language">
                    <option value="id" selected>Indonesia</option>
                </select>
            </div>

            <div class="form-group mt-4">
                <h4>Area</h4>
                <select class="form-control" name="area" id="area">
                    <option value="Asia/Jakarta" selected>Bandung</option>
                </select>
            </div>


            <div class="form-group mt-4">
                <h4>Mode Gelap</h4>
                <label class="switch">
                    <input type="checkbox" id="darkModeToggle">
                    <span class="slider round"></span>
                </label>
            </div>

            <!-- Keluar -->
            <div class="form-group mt-4">
                <a href="{{ url('/logout') }}" class="btn btn-danger">Keluar</a>
            </div>


        </form>
    </div>
</div>

@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <style>
        body.dark-mode {
            background-color: #2c2c2c;
            color: #e0e0e0;
        }

        body.dark-mode .card {
            background-color: #333;
            border-color: #444;
        }

        body.dark-mode .btn:hover {
            background-color: #45a049;
        }

        body.dark-mode .form-control {
            background-color: #444;
            color: #e0e0e0;
            border: 1px solid #555;
        }

        body.dark-mode .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.7);
        }

        /* toggle dark mode */
        .switch {
            position: relative;
            display: inline-block;
            width: 34px;
            height: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #888;
            transition: 0.4s;
            border-radius: 50px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 12px;
            width: 12px;
            border-radius: 50px;
            left: 4px;
            bottom: 4px;
            background-color: #fff;
            transition: 0.4s;
        }

        input:checked+.slider {
            background-color: #4CAF50;
        }

        input:checked+.slider:before {
            transform: translateX(14px);
        }
    </style>

@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        const toggleDarkMode = document.getElementById('darkModeToggle');
        toggleDarkMode.addEventListener('change', function () {
            if (this.checked) {
                document.body.classList.add('dark-mode');
            } else {
                document.body.classList.remove('dark-mode');
            }
        });

        $('.form').submit(function (e) {
            e.preventDefault();
            var form = new FormData(this);
            form.append('id', parseInt(lastId) + 1);
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
                    // Menampilkan toast notification
                    toastr.success('Data berhasil disimpan!');
                    window.location = "{{ url('pages/role') }}";
                },
                error: function (jqxhr, textStatus, error) {
                    var err = textStatus + ", " + error;
                    console.log("Request Failed: " + err);
                }
            });
        });
    </script>
@endpush
