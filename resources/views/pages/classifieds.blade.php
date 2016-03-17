@extends('layout')

@section('content')
    <div class="jumbotron">
        <h1>Объявления</h1>
        <p>Здесь вы може посмотреть объявления, а так же разместить свое</p>

        <a href="classifieds/messages/create" class="btn btn-primary">Создать объявление</a>
        <a href="classifieds/messages/" class="btn btn-primary">Посмотреть все объявления</a>
    </div>
    <h3>Свежие объявления</h3>
    <hr>
    @foreach ($messages as $message)
        <div class="panel panel-success">
            <div class="panel-heading">
                <a href="{{ url('/classifieds/messages',$message->id) }}">{{ $message->name }}</a>
            </div>
            <div class="panel-body">
                Описание: <br>
                {{ $message->description }}
            </div>
            <div class="panel-footer">
                Цена: {{ getPrice($message->price) }}
            </div>
        </div>
    @endforeach
@stop