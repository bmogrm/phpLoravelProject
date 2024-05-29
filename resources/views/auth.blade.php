@extends('layout')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Вход в систему</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action={{url('auth')}} method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Войти</button>
                </div>
                @error('error')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </form>
        </div>
    </div>
</div>
@endsection
