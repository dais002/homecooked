<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Item;
use App\Store;

class StoreItemController extends Controller
{

    public function store(Store $store, ItemRequest $request)
    {
        $this->authorize('addItem', $store);
        $store->items()->create($request->validated());

        return view('stores.show', [
            'store' => $store,
        ]);
    }

    public function create(Store $store)
    {
        $this->authorize('addItem', $store);
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
        return back();
    }
}
