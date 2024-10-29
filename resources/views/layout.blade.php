<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bookly')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('custom_css')
</head>
<body>

    <!-- Preloader -->
    <div id="preloader" class="preloader-container">
        <div class="book">
            <div class="inner">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right"></div>
            </div>
            <ul>
                @for ($i = 0; $i < 18; $i++)
                    <li></li>
                @endfor
            </ul>
        </div>
    </div>

    <!-- Header -->
    @include('layouts.header')

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        window.onload = function() {
            document.getElementById("preloader").style.display = "none";
        };

        var swiper = new Swiper('.main-swiper', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
            autoplay: {
                delay: 5000,
            },
        });
    </script>

    @yield('custom_js')

    <!-- SVG Icons -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <!-- Ícones SVG aqui -->
        <symbol id="search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="currentColor" fill-rule="evenodd"
                d="M11.5 2.75a8.75 8.75 0 1 0 0 17.5a8.75 8.75 0 0 0 0-17.5M1.25 11.5c0-5.66 4.59-10.25 10.25-10.25S21.75 5.84 21.75 11.5c0 2.56-.939 4.902-2.491 6.698l3.271 3.272a.75.75 0 1 1-1.06 1.06l-3.272-3.271A10.21 10.21 0 0 1 11.5 21.75c-5.66 0-10.25-4.59-10.25-10.25"
                clip-rule="evenodd" />
        </symbol>
        <!-- Outros ícones SVG aqui -->
    </svg>

</body>
</html>
