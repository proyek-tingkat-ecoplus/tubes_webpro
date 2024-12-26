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
        {{-- <div class="content-section">
            <img src="https://e0.pxfuel.com/wallpapers/879/771/desktop-wallpaper-cloud-in-the-sky-random-tumblr-cloud-for-your-mobile-tablet-explore-aesthetic-iphone-aesthetic-iphone-aesthetic-aesthetic.jpg" alt="">
        </div>
        <div class="vertical-line"></div> --}}
        <div class="input-section">
            <div class="title">EchoPulse</div>
            <div class="title">Register Your Account</div>
            <form id="registerForm" action="/login" class="form-group">
                <div class="input-group">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" id="username" placeholder="Username" name="username">
                </div>
                <small id="usernameError" class="error-message"></small>
                <div class="input-group">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" id="first_name" placeholder="First Name" name="first_name">
                </div>
                <small id="firstNameError" class="error-message"></small>
                <div class="input-group">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" id="last_name" placeholder="Last Name" name="last_name">
                </div>
                <small id="lastNameError" class="error-message"></small>
                <div class="input-group">
                    <i class="fa-regular fa-envelope icon"></i>
                    <input type="text" id="email" placeholder="Email" name="email">
                </div>
                <small id="emailError" class="error-message"></small>
                <div class="input-group">
                    <i class="fa-solid fa-lock icon"></i>
                    <input type="password" id="password" placeholder="Password" name="password">
                </div>
                <small id="passwordError" class="error-message"></small>
                <div class="input-group">
                    <i class="fa-solid fa-lock icon"></i>
                    <input type="password" id="repeat_password" placeholder="Repeat Password" name="repeat_password">
                </div>
                <small id="repeatPasswordError" class="error-message"></small>
                <button type="submit">Register</button>
            </form>
            <div class="line">
                <span>OR</span>
            </div>
            <button><i class="fa-brands fa-google icon-button"></i>Register with Google</button>
            <button><i class="fa-brands fa-facebook icon-button"></i>Register with Facebook</button>
            <div class="line">
                <span>OR</span>
            </div>
            <div class="bottom-section">
                <div><a href="#">Forgot Password?</a></div>
                <div>Already have an account? <a href="/login">Login</a></div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite(['resources/js/pages/admin/auth/register.js'])

    {{-- <script>
        document.getElementById("registerForm").addEventListener("submit", function(event) {
            event.preventDefault();
            let isValid = true;

            // Clear previous errors and reset styles
            const errorElements = document.querySelectorAll(".error-message");
            errorElements.forEach((error) => (error.textContent = ""));
            document.querySelectorAll("input").forEach(input => input.style.borderBottom = "1px solid #ccc");

            // Get field values
            const firstName = document.getElementById("first_name").value.trim();
            const lastName = document.getElementById("last_name").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value.trim();
            const repeatPassword = document.getElementById("repeat_password").value.trim();

            // Validate each field
            if (!firstName) {
                document.getElementById("firstNameError").textContent = "First name is required.";
                document.getElementById("first_name").style.borderBottom = "2px solid red";
                isValid = false;
            }
            if (!lastName) {
                document.getElementById("lastNameError").textContent = "Last name is required.";
                document.getElementById("last_name").style.borderBottom = "2px solid red";
                isValid = false;
            }
            if (!email) {
                document.getElementById("emailError").textContent = "Email is required.";
                document.getElementById("email").style.borderBottom = "2px solid red";
                isValid = false;
            } else if (!/\S+@\S+\.\S+/.test(email)) {
                document.getElementById("emailError").textContent = "Please enter a valid email address.";
                document.getElementById("email").style.borderBottom = "2px solid red";
                isValid = false;
            }
            if (!password) {
                document.getElementById("passwordError").textContent = "Password is required.";
                document.getElementById("password").style.borderBottom = "2px solid red";
                isValid = false;
            }
            if (!repeatPassword) {
                document.getElementById("repeatPasswordError").textContent = "Please confirm your password.";
                document.getElementById("repeat_password").style.borderBottom = "2px solid red";
                isValid = false;
            } else if (password !== repeatPassword) {
                document.getElementById("repeatPasswordError").textContent = "Passwords do not match.";
                document.getElementById("repeat_password").style.borderBottom = "2px solid red";
                isValid = false;
            }

            // If all fields are valid, proceed to dashboard
            if (isValid) {
                window.location.href = "/dashboard";
            }
        });
    </script> --}}

    <style>
        .error-message {
            color: red;
            font-size: 0.85em;
            padding-top: 5px;
            display: block;
            margin-top: 5px;
        }
        .input-group {
            margin-top: 10px;
        }
        .card > .input-section{
            width: 100% !important  ;
        }
    </style>
</body>
</html>
