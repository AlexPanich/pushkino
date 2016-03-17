@extends('layout')

@section('content')
    <div class="jumbotron">
        <h1>Новости города Пушкино</h1>
        <p>Обо всем что случилось в городе Пушкино, можно прочитать на этой странице</p>
        <a href="news/articles/" class="btn btn-primary">Посмотреть все новсти</a>
    </div>

    <h3>Свежие новости</h3>
    <hr>

    @foreach ($articles as $article)
        <article>
            <h2>
                <a href="{{ url('/news/articles', $article->id) }}">{{ $article->title }}</a>
            </h2>

            <div class="body">{!!
            nl2br($article->preview)
            !!}</div>
        </article>
    @endforeach
@stop