<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryControllerApi;
use App\Http\Controllers\DishControllerApi;
use App\Http\Controllers\IngredientsControllerApi;
use App\Http\Controllers\RecipeControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class,'login']);

Route::get('/category', [CategoryControllerApi::class,'index']);
Route::get('/category/{id}', [CategoryControllerApi::class,'show']);
Route::get('/categories_total', [CategoryControllerApi::class, 'total']);

Route::get('/dish', [DishControllerApi::class,'index']);
Route::get('/dish/{id}', [DishControllerApi::class,'show']);
Route::get('/dishes_total', [DishControllerApi::class,'total']);
Route::post('/dish', [DishControllerApi::class, 'store']);

Route::get('/recipe', [RecipeControllerApi::class,'index']);
Route::get('/recipe/{id}', [RecipeControllerApi::class,'show']);

Route::get('/ingredient', [IngredientsControllerApi::class,'index']);
Route::get('/ingredient/{id}', [IngredientsControllerApi::class,'show']);

Route::get('/logout', [AuthController::class,'logout']);
Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // Route::get('/category', [CategoryControllerApi::class,'index']);
    // Route::get('/category/{id}', [CategoryControllerApi::class,'show']);
    // Route::get('/dish', [DishControllerApi::class,'index']);
    // Route::get('/dish/{id}', [DishControllerApi::class,'show']);
    // Route::get('/recipe', [RecipeControllerApi::class,'index']);
    // Route::get('/recipe/{id}', [RecipeControllerApi::class,'show']);
    // Route::get('/ingredient', [IngredientsControllerApi::class,'index']);
    // Route::get('/ingredient/{id}', [IngredientsControllerApi::class,'show']);

    // Route::get('/logout', [AuthController::class,'logout']);

    // Route::get('/categories_total', [CategoryControllerApi::class, 'total']);
});

//Route::get('/categories_total', [CategoryControllerApi::class, 'total']);