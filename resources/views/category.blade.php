<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>609-11</title>
</head>
<body>
	<h2>{{$category ? "Список блюд категории ".$category->name : "Неверный ID категории" }}</h2>
	@if($category)
	<table border="1">
		<tr>
			<td>id блюда</td>
			<td>Название</td>
			<td>Время приготовления</td>
		</tr>
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
						<td colspan="3">No dishes found</td>
				</tr>
		@endif
	</table>
	@endif
</body>
</html>