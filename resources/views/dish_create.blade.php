<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>609-11</title>
</head>
<body>
	<h2>Добавление блюда</h2>
	<form method="POST" action={{url('dish')}}>
		@csrf
		<label>Категория</label>
		<select name="category_id" value="{{ old('category_id') }}">
			<option style="...">
				@foreach ($categories as $category)
					<option value="{{$category->id}}"
							@if (old('category_id') == $category->id) selected
						@endif> {{$category->name}}
					</option>
				@endforeach
			</option>
		</select>
		<br>
			<label>Наименование</label>
			<input type="text" name="name" value="{{ old('name') }}"/>
			@error('name')
					<div class="is-invalid">{{$message}}</div>
			@enderror
		<br>
			<label>Описание</label>
			<input type="text" name="cooking" value="{{ old('cooking') }}"/>
			@error('cooking')
					<div class="is-invalid">{{$message}}</div>
			@enderror
		<br>
			<label>Время приготовления</label>
			<input type="number" name="time" value="{{ old('time') }}"/>
			@error('time')
					<div class="is-invalid">{{$message}}</div>
			@enderror
		<br>
		<input type="submit">
		</form>
</body>
</html>