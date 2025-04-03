<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Exception;
use Gate;
use Illuminate\Http\Request;
use Storage;

class DishControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response(Dish::limit($request->perpage ?? 5)
            ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
            ->get());

    }

    public function total()
    {
        return response(Dish::all()->count());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::allows('create-dish')) {
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавления блюда',
            ]);
        }
        $validated = $request->validate([
            'name' => 'required|max:255',
            'time' => 'required|numeric|min:1',
            'image' => 'required|file',
            'cooking' => 'required',
            'category_id' => 'required'
        ]);
        $file = $request->file('image');
        $fileName = rand(1, 100000). '_' . $file->getClientOriginalName();
        try {
            $path = $file->storeAs(
                'dishes_pictures',
                $fileName,
                's3'
            );
            $fileUrl = Storage::disk('s3')->url($path);
            error_log($path);
        }
        catch (Exception $e) {
            error_log($path);
            
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка загрузки файла в хранилище S3',
                'debug' => $e->getMessage() // Только для разработки!
            ]);
        }
        $dish = new Dish($validated);
        $dish->picture_url = $fileUrl;
        $dish->save();
        return response()->json([
            'code' => 0,
            'message' => 'Блюдо добавлено',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Dish::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
