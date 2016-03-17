@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1>{{ $message->name }}</h1>
            <h2>{{ getPrice($message->price) }}</h2>
            <hr>

            <div class="description">{!! nl2br($message->description) !!}</div>
            <hr>
            @can('edit_own_message', $message)
                {!! Form::open(['url' => '/classifieds/messages/' . $message->id, 'method' => 'DELETE']) !!}
                <a href="/classifieds/messages/{{ $message->id }}" class="btn btn-success">Читать</a>
                <a href="/classifieds/messages/{{ $message->id }}/edit" class="btn btn-primary">Редактировать</a>
                <button type="submit" class="btn btn-danger">Удалить</button>
                {!! Form::close() !!}
            @endcan
        </div>

        <div class="col-md-8 gallery">
            @foreach ($message->photos->chunk(4) as $set)
                <div class="row">
                    @foreach ($set as $photo)
                        <div class="col-md-3 gallery__image">
                            @can('edit_own_message', $message)
                                {!! Form::open(['url' => '/photo/' . $photo->id, 'method' => 'DELETE']) !!}
                                {!! Form::submit('&times;') !!}
                                {!! Form::close() !!}
                            @endcan
                            <a href="/{{ $photo->path }}"><img src="/{{ $photo->thumbnail_path }}" alt=""></a>
                        </div>
                    @endforeach
                </div>
            @endforeach

            @if (Auth::user() && Auth::user()->owns($message))
                <hr>
                <h4>Добавте фотографии</h4>
                {!! Form::open(['route' => ['store_photo_path', $message->id],
                    'class' => 'dropzone',
                    'id' => 'addPhotoForm']) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </div>
@stop

@section('scripts.footer')
    <script src="/js/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotoForm = {
            paramName: 'photo',
            maxFilesize: 3,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp',
        }
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/dropzone.css">
@stop