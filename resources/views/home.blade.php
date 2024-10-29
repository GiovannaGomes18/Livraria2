<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Book Club - Seu clube de livros</title>
    <link rel="icon" href="/images/From Our CEO (1).jpg" type="image/png">
    
    <!-- CSS Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <!-- Include Header -->
    @include('layouts.header')

    @include('layouts.bannercima')

    @include('layouts.categories')

    @include('layouts.list')

    <!-- Preloader -->
    @include('layouts.limited')

    @include('layouts.bestsitens') <!-- Não precisa passar $livros, já está disponível -->



    <!-- Preloader -->
    @include('layouts.preloader')

    @include('layouts.symbols')

    <!-- Search Popup -->
    @include('layouts.search-popup')

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Scripts -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
