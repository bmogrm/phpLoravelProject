<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>609-11</title>
</head>
<body>
	<h2>Редактирование блюда</h2>
	<form method="POST" action={{url('dish/update/'.$dish->id)}}>
		@csrf
		<label>Категория</label>
		<select name="category_id" value="{{ old('category_id') }}">
			<option style="...">
				@foreach ($categories as $category)
					<option value="{{$category->id}}"
						@if(old('category_id'))
							@if (old('category_id') == $category->id) selected @endif
							@else
								@if($dish->category_id==$category->id) selected @endif
						@endif> {{$category->name}}
					</option>
				@endforeach
			</option>
		</select>
		<br>
			<label>Наименование</label>
			<input type="text" name="name" value="@if (old('name')) {{old('name')}} @else {{$dish->name}} @endif"/>
			@error('name')
					<div class="is-invalid">{{$message}}</div>
			@enderror
		<br>
			<label>Описание</label>
			<input type="text" name="cooking" value="@if (old('cooking')) {{old('cooking')}} @else {{$dish->cooking}} @endif"/>
			@error('cooking')
					<div class="is-invalid">{{$message}}</div>
			@enderror
		<br>
			<label>Время приготовления</label>
			<input type="text" name="time" value="@if (old('time')) {{old('time')}} @else {{$dish->time}} @endif"/>
			@error('time')
					<div class="is-invalid">{{$message}}</div>
			@enderror
		<br>
		<input type="submit">
		</form>
</body>
</html>