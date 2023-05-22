<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::when(request()->has('keyword'), function ($query) {
            $keyword = request()->keyword;
            $query->where("title", "like", "%" . $keyword . "%");
        })->when(request()->has('title'), function ($query) {
            $sortBy = request()->title;
            $query->orderBy('title', $sortBy);
        })->paginate(7)->withQueryString();

        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            "title" => "required|max:50|unique:categories,title",
            "description" => "required|min:100"
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $category = Category::create([
            "title" => $request->title,
            "description" => $request->description,
        ]);
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return response()->json(["message" => "Item is not found"], 404);
        }
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "required|unique:categories,title,$id",
            "description" => "required|min:100",
        ]);

        $category = Category::find($id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->update();
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return response()->json(["message" => "Item is not found"], 404);
        }
        $category->delete();
        return response()->json([], 204);
    }
}
