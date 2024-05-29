@extends('layout')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">{{$category ? "Список блюд категории ".$category->name : "Неверный ID категории" }}</h2>
    @if($category)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>id блюда</th>
                            <th>Название</th>
                            <th>Время приготовления</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($category->dish)
                            @foreach($category->dish as $dish)
                                <tr>
                                    <td>{{$dish->id}}</td>
                                    <td>{{$dish->name}}</td>
                                    <td>{{$dish->time}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">No dishes found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
