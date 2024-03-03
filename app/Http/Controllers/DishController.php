<?php

namespace App\Http\Controllers;
use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function show(string $id)
		{
			return view('dish', [
				'dish' => Dish::all()->where('id', $id)->first()
			]);
		}
}