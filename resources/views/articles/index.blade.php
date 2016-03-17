@extends('layout')

@section('content')
    <h1>Articles</h1>
    <hr>

    @foreach ($articles as $article)
        <article>
            <h2>
                <a href="{{ url('/news/articles', $article->id) }}">{{ $article->title }}</a>
            </h2>

            <div class="body">{!!
            nl2br($article->preview)
            !!}</div>
            @can('edit_article')
                {!! Form::open(['url' => '/news/articles/' . $article->id, 'method' => 'DELETE']) !!}
                <a href="/news/articles/{{ $article->id }}" class="btn btn-success">Читать</a>
                <a href="/news/articles/{{ $article->id }}/edit" class="btn btn-primary">Редактировать</a>
                <button type="submit" class="btn btn-danger">Удалить</button>
                {!! Form::close() !!}
            @endcan
        </article>
    @endforeach
@stop