<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EchoPulse - Forget Password</title>
    <link rel="stylesheet" href="{{asset('asset/css/pages/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="card">
        <div class="input-section">
            <div class="title" >EchoPulse</div>
            <div class="title" >Forget Password</div>
            <form action="/login" class="form-group">
                <div class="input-group">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" placeholder="password lama">
                </div>
                <div class="input-group">
                    <i class="fa-solid fa-lock icon"></i>
                    <input type="text" placeholder="password baru">
                </div>
                <div class="input-group">
                    <i class="fa-solid fa-lock icon"></i>
                    <input type="text" placeholder="ulang password baru">
                </div>
                <button type="submit">Reset Password</button>
            </form>
            <div class="bottom-section">
                <div>Belum punya akun? <a href="/register">Daftar</a></div>
            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
