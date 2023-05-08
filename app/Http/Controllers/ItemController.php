<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $items = Item::all()->max("price", 5); //Using Collection Methods

        // $items = Item::where("price", ">", 900)->orWhere("stock", "<", 10)->get(); // Using query builder

        // $items = Item::all();

        // $newItems = $items->map(function ($item) {
        //     $item->price += 300;
        //     $item->stock -= 3;
        //     return $item;
        // });

        // return $newItems;

        // $items = Item::when(true,function($query) {
        //     $query->where("id", 5);
        // })->get();

        // $items = Item::limit(5)->offset(10)->orderBy("id","desc")->get();

        // $items = Item::where("id",">", 50)->firstOrFail();

        // dd($items);
        // return ($items); // Can use collection method as show collection
        // return view("inventory.index", [
        //     "items" => Item::paginate(7)
        // ]);

        $items = Item::when(request()->has("keyword"), function ($query) {
            $keyword = request()->keyword;
            $query->where("name", "like", "%" . $keyword . "%");
            $query->orWhere("price", "like", "%" . $keyword . "%");
            $query->orWhere("stock", "like", "%" . $keyword . "%");
        })->when(request()->has('name'), function ($query) {
            $sortType = request()->name ?? 'asc';
            $query->orderBy("name", $sortType);
        })->paginate(7)->withQueryString();

        return view("inventory.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("inventory.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->save();
        return redirect()->route('item.index')->with('status', "New Item Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('inventory.show', ["item" => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('inventory.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->update();
        return redirect()->route('item.index')->with("status", "Item Update Successful");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->back()->with("status", "Item Deleted");
    }
}
