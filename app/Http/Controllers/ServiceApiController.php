<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Storage;
use League\Flysystem\AwsS3V3\PortableVisibilityConverter;
class ServiceApiController extends Controller
{
    // public function index(Request $request)
    // {
    //     return response(Service::limit($request->perpage ?? 5) -> offset(($request->perpage ?? 5)
    //     * ($request->page ?? 0)) -> get());
    // }
    public function store(Request $request)
    {
        if (Gate::allows('create-service')) {
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление услуги',
            ]);
        }
        $validated = $request->validate([
            'name' => 'required|unique:services|max:255',
            'image' => 'required|file',
            // 'price' => 'required|numeric|min:0',
        ]);
        $file = $request->file('image');
        $fileName = rand(1, 100000). '_' . $file->getClientOriginalName();
        try {
            $path = Storage::disk('s3')->putFileAs('services_pictures', $file, $fileName);
            $fileUrl = Storage::disk('s3')->url($path);
        }
        catch (Exception $e) {
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка загрузки файла в хранилище S3',
            ]);
        };
        $category = new Category($validated);
        $category->picture_url = $fileUrl;
        $category->save();
        return response()->json([
            'code' => 0,
            'message' => 'Услуга успешно добавлена',
        ]);
    }
    // public function show(string $id)
    // {
    //     return response(Service::find($id));
    // }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
    // public function total()
    // {
    //     return response(Service::all()->count());
    // }
}
