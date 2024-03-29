<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>609-11</title>
</head>
<body>
	<h2>Список блюд:</h2>
	{{$dishes->links()}}
	<br>
	<table border="1">
		<thead>
			<td>id</td>
			<td>id категории</td>
			<td>Наименование</td>
			<td>Описание</td>
			<td>Время приготовления</td>
		</thead>
		@foreach ($dishes as $dish)
			<tr>
				<td>{{$dish->id}}</td>
				<td>{{$dish->category_id}}</td>
				<td>{{$dish->name}}</td>
				<td>{{$dish->cooking}}</td>
				<td>{{$dish->time}}</td>
				<td>
					<a href="{{url('dish/destroy/'.$dish->id.'-'.$dish->name)}}">Удалить</a>
					<a href="{{url('dish/edit/'.$dish->id)}}">Редактировать</a>
				</td>
			</tr>
		@endforeach
	</table>
	<br>
	<button><a href="{{url('dish/create')}}">Добавить блюдо</a></button>
	<br>
	<br>
	<a href="{{url('logout')}}">Выйти из системы</a>
</body>
</html>