<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <title>Сайн города Пушкино</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/libs.css">
    @yield('css')
</head>
<body>

    @include('nav')

    <div class="container">
        @yield('content')
    </div>

    <script src="/js/libs.js"></script>

    @yield('scripts.footer')

    @include('flash')
</body>
</html>