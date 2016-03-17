<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Пушкино</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Главная</a></li>
                <li><a href="/news">Новости</a></li>
                <li><a href="/classifieds">Объявления</a></li>
            </ul>

            @if (Auth::check())
                @can('view_admin')
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/admin') }}">Панель администратора</a></li>
                    </ul>
                @endcan
                <p class="navbar-text navbar-right">
                    Привет, {{ Auth::user()->name }}
                    <a href="{{ url('/logout') }}" class="navbar-link">Выйти</a></p>
                </p>

            @else
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/login') }}">Войти</a></li>
                    <li><a href="{{ url('/register') }}">Регистрация</a></li>
                </ul>
            @endif
        </div>
    </div>
</nav>