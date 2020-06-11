<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Item;
use App\Store;
use Illuminate\Http\Request;

class StoreItemController extends Controller
{

    public function index(Store $store)
    {
        $items = $store->items;
        return ItemResource::collection($items);
    }

    // store comes first due to endpoint url
    public function store(Store $store, ItemRequest $request)
    {
        $storeItem = $store->items()->create($request->validated());
        return new ItemResource($storeItem);
    }

    public function show(Store $store, Item $item)
    {
        $storeItem = $store->items()->findOrFail($item->id);
        return new ItemResource($storeItem);
    }

    // added a create route
    public function create(Store $store)
    {
        return view('stores.items.create', [
            'store_id' => $store->id,
        ]);
    }

    public function update(ItemRequest $request, Store $store, Item $item)
    {
        $storeItem = $store->items()
            ->findOrFail($item->id)
            ->update($request->validated());
        return new ItemResource($storeItem);
    }

    public function destroy(Store $store, Item $item)
    {
        $storeItem = $store->items()->findOrFail($item->id);
        $storeItem->delete();
        return response()->noContent();
    }
}
