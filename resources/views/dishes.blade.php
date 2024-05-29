@extends('layout')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Список блюд:</h2>
        {{$dishes->links('pagination::bootstrap-5')}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>id</th>
                        <th>id категории</th>
                        <th>Наименование</th>
                        <th>Описание</th>
                        <th>Время приготовления</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dishes as $dish)
                        <tr>
                            <td>{{$dish->id}}</td>
                            <td>{{$dish->category_id}}</td>
                            <td>{{$dish->name}}</td>
                            <td>{{$dish->cooking}}</td>
                            <td>{{$dish->time}}</td>
                            <td>
                                <a href="{{url('dish/destroy/'.$dish->id.'-'.$dish->name)}}" class="btn btn-danger btn-sm me-1">Удалить</a>
                                <a href="{{url('dish/edit/'.$dish->id)}}" class="btn btn-primary btn-sm">Редактировать</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            <a href="{{url('dish/create')}}" class="btn btn-success">Добавить блюдо</a>
        </div>
    </div>
@endsection
