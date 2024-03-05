<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
		public function index()
		{
			return view('dishes', [
				'dishes' => Dish::all()
			]);
		}

    public function show(string $id)
		{
			return view('dish', [
				'dish' => Dish::all()->where('id', $id)->first()
			]);
		}

		public function create()
		{
			return view('dish_create', [
				'categories' => Category::all()
			]);
		}

		public function store(Request $request)
		{
			$validated = $request->validate([
				'category_id' => 'integer',
				'name' => 'required|unique:dishes|max:255',
				'cooking' => 'required|unique:dishes',
				'time' => 'required|integer'
			]);
			$dish= new Dish($validated);
			$dish->save();
			return redirect('/dishes');
		}

		public function edit(string $id)
		{
			return view('dish_edit', [
				'dish' => Dish::all()->where('id', $id)->first(),
				'categories' => Category::all()
			]);
		}

		public function update(Request $request, string $id)
		{
			$validated = $request->validate([
				'category_id' => 'integer',
				'name' => 'required|max:255',
				'cooking' => 'required',
				'time' => 'required|integer'
			]);
			$dish = Dish::all()->where('id', $id)->first();
			$dish->category_id = $validated['category_id'];
			$dish->name = $validated['name'];
			$dish->cooking = $validated['cooking'];
			$dish->time = $validated['time'];
			$dish->save();
			return redirect('/dishes');
		}

		public function destroy(string $id)
		{
			Dish::destroy($id);
			return redirect('/dishes');
		}
}