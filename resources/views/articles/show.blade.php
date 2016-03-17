@extends('layout')

@section('content')
    <h1>{{ $article->title }}</h1>
    <hr>

    <article>
        {!! nl2br($article->body) !!}
    </article>

    @unless ($article->tags->isEmpty())
        <h4>Тэги:</h4>
        <ul>
            @foreach ($article->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endunless

    @can('edit_article')
        {!! Form::open(['url' => '/news/articles/' . $article->id, 'method' => 'DELETE']) !!}
        <a href="/news/articles/{{ $article->id }}" class="btn btn-success">Читать</a>
        <a href="/news/articles/{{ $article->id }}/edit" class="btn btn-primary">Редактировать</a>
        <button type="submit" class="btn btn-danger">Удалить</button>
    {!! Form::close() !!}
    @endcan
@stop