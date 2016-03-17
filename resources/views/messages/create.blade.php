@extends('layout')

@section('content')
    <h1>Создайте свое объявление</h1>
    <hr>
    @can('create_message')
        <div class="row">
            {!! Form::open(['url' => '/classifieds/messages', 'class' => 'col-md-6 col-md-offset-3']) !!}
                @include('messages.form', ['submitButtonText' => 'Создать объявление']);
            {!! Form::close() !!}
        </div>
    @endcan

    @include('errors.list')
@stop