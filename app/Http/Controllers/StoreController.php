<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Resources\StoreResource;
use App\Http\Resources\StoresResource;
use App\Store;
use App\Tag;

class StoreController extends Controller
{

    public function index()
    {

        $stores = Store::paginate(15);

        // $storeCollection = StoresResource::collection($stores)
        // return $storeCollection;
        return view('stores.index', [
            'stores' => $stores,
        ]);
    }

    public function store(StoreRequest $request)
    {
        // $store = auth()->user()->stores()->create($request->validated());
        $store = Store::create($request->validated());
        return new StoreResource($store);
    }

    public function show(Store $store)
    {
        // return new StoreResource($store);
        return view('stores.show', [
            'store' => $store,
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
        return back();
        // return response()->noContent();
    }
}
