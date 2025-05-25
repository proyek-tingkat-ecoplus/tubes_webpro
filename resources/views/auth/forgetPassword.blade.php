<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EchoPulse - Forget Password</title>
    <link rel="icon" type="image/png" href="https://png.pngtree.com/png-vector/20240506/ourmid/pngtree-fun-anime-leaf-symbol-png-image_12372412.png"/>
    <link rel="stylesheet" href="{{asset('asset/css/pages/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color:#003030">
    <main class="login-form">
      <div class="container">
          <div class="justify-content-center">
              <div class="col-md-12">
                  <div class="card" style="width: 40rem;">
                      <div class="card-header text-center fw-bold">Reset Password</div>

                      <div class="card-body">
                        @if (Session::has('message'))
                             <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif

                          <form action="{{route('forget.password.post')}}" method="POST">
                              @csrf
                              <div class="form-group row">
                                  <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                  <div class="col-md-6">
                                      <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                      @if ($errors->has('email'))
                                          <span class="text-danger">{{ $errors->first('email') }}</span>
                                      @endif
                                  </div>
                              </div>
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary mt-2">
                                      Send Password Reset Link
                                  </button>
                                  <a href="/login" type="button" class=" mt-2 btn btn-danger">Kembali</a>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
