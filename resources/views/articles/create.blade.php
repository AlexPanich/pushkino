@extends('layout')

@section('content')
    <h1>Write a New Article</h1>
    <hr>

    @can('create_article')
        {!! Form::model($article = new \App\Article, ['url' => 'news/articles']) !!}
            @include('articles.form', ['submitButtonText' => 'Создать статью'])
        {!! Form::close() !!}
    @endcan

    @include('errors.list')
@stop

@include('select2')