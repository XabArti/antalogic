@extends('front.layout')

@section('main')
    <div class="container">
        <h1>Просмотр новости</h1>
        <div class="form-group">
            <label>Наименование</label>
            <input type="text" class="form-control" value="{{$model->title}}" readonly>
        </div>
        <div class="form-group">
            <label>Текст</label>
            <input type="text" class="form-control" value="{{$model->text}}" readonly>
        </div>
    </div>
@endsection
