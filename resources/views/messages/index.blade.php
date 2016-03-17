@extends('layout')

@section('content')
    <h1>Все объявления</h1>
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
            @can('edit_message')
                {!! Form::open(['url' => '/classifieds/messages/' . $message->id, 'method' => 'DELETE']) !!}
                <a href="/classifieds/messages/{{ $message->id }}" class="btn btn-success">Читать</a>
                <a href="/classifieds/messages/{{ $message->id }}/edit" class="btn btn-primary">Редактировать</a>
                <button type="submit" class="btn btn-danger">Удалить</button>
                {!! Form::close() !!}
            @endcan
        </div>
    @endforeach
@stop