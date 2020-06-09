<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        $item = Item::paginate();
        return ItemResource::collection($item);
        // removed store_id from the resource
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
        $item = Item::find($id)->update($request->validate());
        return $item;
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return response()->noContent();
    }
}
