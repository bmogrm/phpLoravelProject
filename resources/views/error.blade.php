{{-- <div class="error">
    <h2 class="error__title">{{ $message }}</h2>
    <a class="error__back" href="{{url('dishes')}}">Назад</a>
</div>
 --}}

<div class="container" style="margin-top: 80px">
	@error('email')
	<div class="alert alert-warning" role="alert">
			{{ $message }}
	</div>
	@enderror
	@error('password')
	<div class="alert alert-warning" role="alert">
			{{ $message }}
	</div>
	@enderror
	@error('error')
	<div class="alert alert-warning" role="alert">
			{{ $message }}
	</div>
	@enderror
	@error('success')
	<div class="alert alert-success" role="alert">
			{{ $message }}
	</div>
	@enderror
</div>