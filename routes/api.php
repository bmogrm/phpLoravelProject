<?php

use App\Http\Controllers\CategoryControllerApi;
use App\Http\Controllers\DishControllerApi;
use App\Http\Controllers\LoginControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::group(['middleware' => ['auth:sanctum']], function ()){
//     Route::get('/item', []);
// }
Route::get('/category', [CategoryControllerApi::class,'index']);
Route::get('/category/{id}', [CategoryControllerApi::class,'show']);
Route::get('/dish', [DishControllerApi::class,'index']);
Route::get('/dish/{id}', [DishControllerApi::class,'show']);
Route::get('/login', [LoginControllerApi::class,'index']);
Route::get('/login/{id}', [LoginControllerApi::class,'show']);
