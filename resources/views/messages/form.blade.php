


<div class="form-group">
    {!! Form::label('name', 'Название:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('type', 'Тип объявления:') !!}
    {!! Form::select('type', [
        'sale' => 'Продаю',
        'buy' => 'Куплю',
        'service' => 'Услуги',
    ], 'sale', ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Цена:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Описание:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '10', 'required']) !!}
</div>

{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
