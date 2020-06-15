<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Item;
use App\Store;

class StoreItemController extends Controller
{

    public function index(Store $store)
    {
        $items = $store->items;
        return ItemResource::collection($items);
    }

    public function store(Store $store, ItemRequest $request)
    {
        $store->items()->create($request->validated());
        return view('stores.show', [
            'store' => $store,
        ]);

        // $storeItem = $store->items()->create($request->validated());
        // return new ItemResource($storeItem);
    }

    public function show(Store $store, Item $item)
    {
        $storeItem = $store->items()->findOrFail($item->id);
        return new ItemResource($storeItem);
    }

    public function create(Store $store)
    {
        return view('stores.items.create', [
            'store' => $store,
        ]);
    }

    public function update(Store $store, Item $item)
    {
        $attributes = request()->validate([
            'description' => 'string|max:255|nullable',
            'image' => 'string|nullable',
            'limit' => 'integer|required'
        ]);

        $store->items()
            ->findOrFail($item->id)
            ->update($attributes);

        return view('stores.show', [
            'store' => $store,
        ]);
    }

    // added a edit route
    public function edit(Store $store, Item $item)
    {
        return view('stores.items.edit', [
            'store' => $store,
            'item' => $item,
        ]);
    }

    public function destroy(Store $store, Item $item)
    {
        $storeItem = $store->items()->findOrFail($item->id);
        $storeItem->delete();
        return response()->noContent();
    }
}
