<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeControllerApi extends Controller
{
    public function index()
    {
        return response(Recipe::all());
    }

    public function show(string $id)
    {
        return response(Recipe::find($id));
    }
}
