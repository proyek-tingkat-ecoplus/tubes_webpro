<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EchoPulse - Register</title>
    <link rel="stylesheet" href="{{asset('asset/css/pages/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <div class="card">
        <div class="content-section">
            <img src="https://e0.pxfuel.com/wallpapers/879/771/desktop-wallpaper-cloud-in-the-sky-random-tumblr-cloud-for-your-mobile-tablet-explore-aesthetic-iphone-aesthetic-iphone-aesthetic-aesthetic.jpg" alt="">
        </div>
        <div class="vertical-line"></div>
        <div class="input-section">
            <div class="title" >EchoPulse</div>
            <div class="title" >Register Your Acount</div>
            <form action="/dashboard" class="form-group">
                <div class="input-group">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" placeholder="first name" name="first_name">
                    <i class="fa-solid fa-user icon" style="margin-left: 10px;"></i>
                    <input type="text" placeholder="last name" name="last_name">
                </div>
                <div class="input-group">
                    <i class="fa-regular fa-envelope icon"></i>
                    <input type="text" placeholder="password">
                </div>
                <div class="input-group">
                    <i class="fa-solid fa-lock icon"></i>
                    <input type="text" placeholder="password" name="password">
                    <i class="fa-solid fa-lock icon"style="margin-left: 10px;"></i>
                    <input type="text" placeholder="repeat password" name="repeat_password">
                </div>
                <button type="submit">Register</button>
            </form>
            <div class="line">
                <span>OR</span>
            </div>
            <button><i class="fa-brands fa-google icon-button"></i>Masuk dengan google</button>
            <button><i class="fa-brands fa-facebook icon-button"></i>Masuk dengan Facebook</button>
            <div class="line">
                <span>OR</span>
            </div>
            <div class="bottom-section">
                <div><a href="">Forgot Password?</a></div>
                <div>Sudah punya akun? <a href="#">Login</a></div>
            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>