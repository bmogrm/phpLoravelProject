@extends('layout')
@section('content')
	<h2>{{$dish ? "Рецепт приготовления - " .$dish->name : 'Неверное id блюда'}}</h2>
	@if($dish)
	<table border='1'>
		<tr>
			<td>id</td>
			<td>Наименование</td>
			<td>Единица измерения</td>
			<td>Кол-во</td>
		</tr>
		@foreach ($dish->ingredients as $ingredient)
			<tr>
				<td>{{$ingredient->id}}</td>
				<td>{{$ingredient->name}}</td>
				<td>{{$ingredient->unit}}</td>
				<td>{{$ingredient->pivot->count}}</td>
			</tr>
		@endforeach
	</table>
	@endif
@endsection