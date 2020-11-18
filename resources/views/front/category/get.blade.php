@extends('front.layout')

@section('main')
    <div class="container">
        <h1>Категориия {{$model->title}}</h1>
        <div class="form-group">
            <label>Наименование</label>
            <input type="text" class="form-control" value="{{$model->title}}" readonly>
        </div>
        <h2>Список новостей</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th>Наменование</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($model->news as $v)
                <tr>
                    <th scope="row">{{$v->id}}</th>
                    <td>{{$v->title}}</td>
                    <td><a href="{{route('news.get', ['id' => $v->id])}}">Смотреть новость</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
