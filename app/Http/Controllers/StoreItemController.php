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

    // store comes first due to endpoint url
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

    // added a create route
    public function create(Store $store)
    {
        return view('stores.items.create', [
            'store' => $store,
        ]);
    }

    // update route
    public function update(Store $store, Item $item, ItemRequest $request)
    {
        die('in update');
        $store->items()
            ->findOrFail($item->id)
            ->update($request->validated());
        return view('stores.show', [
            'store' => $store,
        ]);
        // return new ItemResource($storeItem);
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
