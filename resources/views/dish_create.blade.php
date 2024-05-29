@extends('layout')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Добавление блюда</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action={{url('dish')}}>
                @csrf
                <div class="mb-3">
                    <label for="category_id" class="form-label">Категория</label>
                    <select class="form-select" name="category_id" value="{{ old('category_id') }}">
                        <option value="" selected disabled>Выберите категорию</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                    @if (old('category_id') == $category->id) selected @endif>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Наименование</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cooking" class="form-label">Описание</label>
                    <input type="text" class="form-control @error('cooking') is-invalid @enderror" id="cooking" name="cooking" value="{{ old('cooking') }}">
                    @error('cooking')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Время приготовления</label>
                    <input type="number" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ old('time') }}">
                    @error('time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Добавить блюдо</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
