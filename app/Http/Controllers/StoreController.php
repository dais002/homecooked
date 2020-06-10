<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Resources\StoreResource;
use App\Http\Resources\StoresResource;
use App\Store;

class StoreController extends Controller
{

    public function index()
    {
        $store = Store::paginate();
        $storeCollection = StoresResource::collection($store);
        // dd($storeCollection);
        // return StoresResource::collection($store);
        return view('stores.index', [
            'stores' => $storeCollection->collection,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $store = Store::create($request->validated());
        return new StoreResource($store);
    }

    public function show(Store $store)
    {
        $showStore = new StoreResource($store);
        return view('stores.show', [
            'stores' => $showStore,
        ]);
    }

    public function update(StoreRequest $request, $id)
    {
        $store = Store::find($id)->update($request->validated());
        return new StoreResource($store);
    }


    public function destroy(Store $store)
    {
        $store->delete();
        return response()->noContent();
    }
}
