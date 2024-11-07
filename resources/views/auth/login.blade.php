<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EchoPulse - Login</title>
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
            <div class="title">EchoPulse</div>
            <div class="title">Welcome Back</div>
            <form id="loginForm" class="form-group" action="/dashboard">
                <div class="input-group">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" id="username" placeholder="Username" >
                </div>
                <div id="usernameError" class="error-message"></div>
                <div class="input-group">
                    <i class="fa-solid fa-lock icon"></i>
                    <input type="password" id="password" placeholder="Password" >
                </div>
                <div id="passwordError" class="error-message"></div>
                <button type="submit">Masuk</button>
            </form>
            <div class="line">
                <span>OR</span>
            </div>
            <button><i class="fa-brands fa-google icon-button"></i>Masuk dengan Google</button>
            <button><i class="fa-brands fa-facebook icon-button"></i>Masuk dengan Facebook</button>
            <div class="line">
                <span>OR</span>
            </div>
            <div class="bottom-section">
                <div><a href="#">Forgot Password?</a></div>
                <div>Belum punya akun? <a href="/register">Daftar</a></div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault();
            document.getElementById("usernameError").textContent = "";
            document.getElementById("passwordError").textContent = "";


            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();
            let isValid = true;

            if (!username) {
                document.getElementById("usernameError").textContent = "Username is required.";
                document.getElementById("username").style.borderBottom = "1px solid red";
                isValid = false;
            }

            if (!password) {
                document.getElementById("passwordError").textContent = "Password is required.";
                document.getElementById("password").style.borderBottom = "1px solid red";
                isValid = false;
            }

            if (isValid) {
                window.location.href = "/dashboard";
            }
        });

        document.getElementById("username").addEventListener("input", function() {
            if (this.value.trim()) {
                document.getElementById("username").style.borderBottom = "1px solid grey";
                document.getElementById("usernameError").textContent = "";
            }
        });

        document.getElementById("password").addEventListener("input", function() {
            if (this.value.trim()) {
                document.getElementById("password").style.borderBottom = "1px solid grey";
                document.getElementById("passwordError").textContent = "";
            }
        });
    </script>

    <style>
        .error-message {
            color: red;
            font-size: 0.85em;
            padding-top: 5px;
            margin-left: 20px;
        }
    </style>
</body>
</html>
