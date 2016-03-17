@extends('layout')

@section('content')
    @can('edit_message')
        {!! Form::model($message, [
            'method' => 'PATCH',
            'action' => ['MessagesController@update', $message->id],
            'class' => 'col-md-6 col-md-offset-3',
            ]) !!}
            @include('messages.form', ['submitButtonText' => 'Обновить объявление'])
        {!! Form::close() !!}
    @endcan
@stop