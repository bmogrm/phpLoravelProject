<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\LoginController;
use App\Models\Dish;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function (){
		return view('hello', ['title' => 'Hello world!']);
});

//Categories
Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth');
Route::get('/category/{id}', [CategoryController::class, 'show'])->middleware('auth');

//Edit dishes
Route::get('/dish/create', [DishController::class, 'create'])->middleware('auth');
Route::post('/dish', [DishController::class, 'store'])->middleware('auth');
Route::get('/dish/edit/{id}', [DishController::class, 'edit'])->middleware('auth');
Route::post('/dish/update/{id}', [DishController::class, 'update'])->middleware('auth');
Route::get('/dish/destroy/{id}-{name}', [DishController::class, 'destroy'])->middleware('auth');

//List of Dishes and Recipe(id)
Route::get('/dishes', [DishController::class, 'index'])->middleware('auth');
Route::get('/recipe/{id}', [DishController::class, 'show'])->middleware('auth');

//login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);
Route::get('/error', function() {
	return view ('error', ['message' => session('message')]);
});