@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
      <form method="POST" action={{url('dish/update/'.$dish->id)}}>
				@csrf
				<h2>Редактирование блюда</h2>
				<div class="form-group mb-3">
					<label for="exampleFormControlInput1">Категория</label>
					<select class="form-control" name="category_id" value="{{ old('category_id') }}">
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
				</div>
				<div class="form-group mb-3">
					<label for="exampleFormControlSelect1">Наименование</label>
					<input class="form-control" type="text" name="name" value="@if (old('name')) {{old('name')}} @else {{$dish->name}} @endif"/>
					@error('name')
							<div class="is-invalid">{{$message}}</div>
					@enderror
				</div>
				<div class="form-group mb-3">
					<label for="exampleFormControlSelect2">Описание</label>
					<input class="form-control" type="text" name="cooking" value="@if (old('cooking')) {{old('cooking')}} @else {{$dish->cooking}} @endif"/>
					@error('cooking')
							<div class="is-invalid">{{$message}}</div>
					@enderror
				</div>
				<div class="form-group mb-3">
					<label for="exampleFormControlTextarea1">Время приготовления</label>
					<input class="form-control" type="text" name="time" value="@if (old('time')) {{old('time')}} @else {{$dish->time}} @endif"/>
					@error('time')
							<div class="is-invalid">{{$message}}</div>
					@enderror
				</div>
				<input class="form-control btn btn-primary" type="submit">
			</form>
    </div>
    <div class="col">
    </div>
  </div>
</div>
@endsection
{{-- 
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
@endsection --}}