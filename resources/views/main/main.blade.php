<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Local CSS -->
    <link rel="stylesheet" href="{{asset('asset/style.css')}}">
    <link rel="stylesheet" href="asset/js/script.css">
    <link rel="stylesheet" href="{{ asset('asset/css/typeahead.css') }}">
    <link rel="stylesheet" href="{{asset('asset/css/pages/kontakDetails.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/pages/kontakCards.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/pages/form.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/pages/kontakDetails.css')}}">
    <title>Disnaker</title>
    <style>
        span.twitter-typeahead{
            width: 80%;
        }
    </style>
</head>

<body>

    @stack ('styles')
    <!-- Navbar -->
    @include('main.navbar') <!-- buat include navbar -->

    @yield('content')

    @include('main.footer') <!-- buat include footer -->

    <!-- Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- script -->
    <script type="module" src="{{ asset('asset/js/lannding_pagejs.js') }}"></script>
    <script type="module" src="{{ asset('asset/js/costom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/typeahead/typeahead.jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/typeahead/bloodhound.min.js') }}"></script>

    @stack('scripts')

    <script>
        // Read More
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Tampilkan selengkapnya";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Tampilkan singkat";
                moreText.style.display = "inline";
            }
        }

        // Swiper
        var swiper = new Swiper(".swiper1", {
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        // Scroll Back To Top
        var mybutton = document.getElementById("totop");
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

    </script>


</body>

</html>
