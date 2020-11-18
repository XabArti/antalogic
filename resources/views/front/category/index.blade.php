@extends('front.layout')

@section('main')
    <div class="container">
        <h1>Категории</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th>Наменование</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($model as $v)
                <tr>
                    <th scope="row">{{$v->id}}</th>
                    <td>{{$v->title}}</td>
                    <td><a href="{{route('category.get', ['id' => $v->id])}}">Смотреть список новостей</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
