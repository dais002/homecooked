<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Resources\StoreResource;
use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {
        $store = Store::paginate();
        return StoreResource::collection($store);
    }


    public function store(StoreRequest $request)
    {
        // not sure why this isn't working either...
        // tested a post request to items, it works
        // post request here keeps getting server error....
        $store = Store::create($request->validated());
        return $store;
    }

    public function show(Store $store)
    {
        return new StoreResource($store);
    }


    public function update(StoreRequest $request, $id)
    {
        // same issue.... doesn't work....
        $store = Store::find($id)->update($request->validated());
        return $store;
    }


    public function destroy(Store $store)
    {
        $store->delete();
        return response()->noContent();
    }
}
