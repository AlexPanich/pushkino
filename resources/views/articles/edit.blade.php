@extends('layout')

@section('content')
    <h1>Edit: {!! $article->title !!}</h1>
    <hr>

    @can('edit_article')
        {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
            @include('articles.form', ['submitButtonText' => 'Обновить статью'])
        {!! Form::close() !!}
    @endcan

    @include('errors.list')
@stop

@include('select2');