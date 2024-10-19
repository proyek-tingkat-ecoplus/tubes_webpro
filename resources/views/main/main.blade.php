<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- Local CSS -->
    <link rel="stylesheet" href="{{asset('asset/style.css')}}">
    <link rel="stylesheet" href="asset/js/script.css">
    <link rel="stylesheet" href="{{ asset('asset/css/typeahead.css') }}">
    <title>Disnaker</title>
    <style>
        span.twitter-typeahead{
            width: 80%;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    @include('main.navbar') <!-- buat include navbar -->

    @yield('content')

    @include('main.footer') <!-- buat include footer -->

    <!-- Swiper -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- script -->
    <script type="module" src="{{ asset('asset/js/lannding_pagejs.js') }}"></script>
    <script type="module" src="{{ asset('asset/js/costom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/typeahead/typeahead.jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/typeahead/bloodhound.min.js') }}"></script>

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
