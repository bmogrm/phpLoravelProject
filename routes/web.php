<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
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
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::get('/dish/create', [DishController::class, 'create']);
Route::post('/dish', [DishController::class, 'store']);
Route::get('/dish/edit/{id}', [DishController::class, 'edit']);
Route::post('/dish/update/{id}', [DishController::class, 'update']);
Route::get('/dish/destroy/{id}', [DishController::class, 'destroy']);
Route::get('/dishes', [DishController::class, 'index']);
Route::get('/recipes/{id}', [DishController::class, 'show']);