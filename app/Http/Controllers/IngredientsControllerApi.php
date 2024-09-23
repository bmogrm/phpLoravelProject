<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientsControllerApi extends Controller
{
    public function index()
    {
        return response(Ingredient::all());
    }

    public function show(string $id)
    {
        return response(Ingredient::find($id));
    }
}
