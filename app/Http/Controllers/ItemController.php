<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Item;

class ItemController extends Controller
{

    public function index()
    {
        $item = Item::paginate();
        return ItemResource::collection($item);
    }

    public function store(ItemRequest $request)
    {
        $item = Item::create($request->validated());
        return $item;
    }

    // public function show(Item $item)
    // {
    //     return new ItemResource($item);
    // }

    public function update(ItemRequest $request, $id)
    {
        $item = Item::find($id)->update($request->validated());
        return $item;
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return response()->noContent();
    }
}
