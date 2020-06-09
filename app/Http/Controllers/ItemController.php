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
        // don't think i need store_id from here
    }

    public function store(ItemRequest $request)
    {
        $item = Item::create($request->validated());
        return $item;
    }

    public function show(Item $item)
    {
        // may need store_id here for patch request
        return new ItemResource($item);
    }

    public function update(ItemRequest $request, $id)
    {
        // need store_id here for patching
        // route isnt working... tested each field one by one...
        // keep getting a server error when sending the patch request with all required data
        $item = Item::find($id)->update($request->validated());
        return $item;
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return response()->noContent();
    }
}
