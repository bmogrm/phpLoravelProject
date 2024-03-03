<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>609-11</title>
</head>
<body>
	<h2>{{$dish ? "Список ингредиентов блюда " .$dish->name : 'Неверное id блюда'}}</h2>
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
</body>
</html>