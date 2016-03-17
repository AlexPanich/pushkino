<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('nav')

    <div class="container">
        @yield('content')
    </div>

</body>
</html>