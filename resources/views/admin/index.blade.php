@extends('adminlayout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Статьи</h2>
            <hr>
            <a href="/news/articles/create" class="btn btn-primary">Создать статью</a>
            @foreach ($articles as $article)
                <hr>
                <h3>{{ $article->title }}</h3>
                {!! Form::open(['url' => '/news/articles/' . $article->id, 'method' => 'DELETE']) !!}
                <a href="/news/articles/{{ $article->id }}" class="btn btn-success">Читать</a>
                <a href="/news/articles/{{ $article->id }}/edit" class="btn btn-primary">Редактировать</a>
                <button type="submit" class="btn btn-danger">Удалить</button>
                {!! Form::close() !!}
            @endforeach
        </div>

        <div class="col-md-6">
            <h2>Объявления</h2>
            @foreach ($messages as $message)
                <hr>
                <h3>{{ $message->name }}</h3>
                {!! Form::open(['url' => '/classifieds/messages/' . $message->id, 'method' => 'DELETE']) !!}
                <a href="/classifieds/messages/{{ $message->id }}" class="btn btn-success">Читать</a>
                <a href="/classifieds/messages/{{ $message->id }}/edit" class="btn btn-primary">Редактировать</a>
                <button type="submit" class="btn btn-danger">Удалить</button>
                {!! Form::close() !!}
            @endforeach
        </div>





    </div>
@stop