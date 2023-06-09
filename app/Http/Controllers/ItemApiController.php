<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class ItemApiController extends Controller
{


    public function __construct()
    {
        // $this->middleware("cat")->only("show");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $items = Item::when(request()->has("keyword"), function ($query) {
            $keyword = request()->keyword;
            $query->where("name", "like", "%" . $keyword . "%");
            $query->orWhere("price", "like", "%" . $keyword . "%");
            $query->orWhere("stock", "like", "%" . $keyword . "%");
        })->when(request()->has('name'), function ($query) {
            $sortType = request()->name ?? 'asc';
            $query->orderBy("name", $sortType);
        })->paginate(7)->withQueryString();

        // return response()->json($items);
        return ItemResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     "name" => "required|unique:items,name",
        //     "price" => "required",
        //     "stock" => "required"
        // ]);

        // Testing validation using validator facades


        $validator = Validator::make($request->all(), [
            "name" => "required|unique:items,name",
            "price" => "required",
            "stock" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $item = Item::create([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
        ]);
        // return response()->json($item);
        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => "Item is not found"], 404);
        }
        // return response()->json($item, 200);
        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            "name" => "required",
            "price" => "required",
            "stock" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => "Item is not found"], 404);
        };

        $item->update([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
        ]);
        // return response()->json($item);
        return new ItemResource($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => "Item is not found"], 404);
        };
        $item->delete();
        return response()->json([], 204);
        // return new ItemResource($item);
    }
}
