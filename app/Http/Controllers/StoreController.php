<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Item;
use Facades\App\Repository\Stores;
use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index(Request $request)
    {
        $stores = Stores::allStores($request, 'name');

        return view('stores.index', [
            'stores' => $stores,
        ]);
    }

    public function show(Store $store)
    {
        $store = Stores::getStore($store);

        return view('stores.show', [
            'store' => $store,
            'cart' => auth()->user()->cart,
        ]);
    }

    public function create()
    {
        $this->authorize('addStore', Store::class);
        return view('stores.create');
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('addStore', Store::class);

        $store = Store::create($request->validated());
        $store->users()->attach(auth()->user());

        return redirect()->route('stores.index');

        /* --------- for uploading images from local storage --------- */
        // $this->authorize('addStore', Store::class);

        // $attributes = $request->validated();
        // $attributes['logo'] = request('logo')->store('logos');

        // $store = Store::create($attributes);
        // $store->users()->attach(auth()->user());

        // return redirect()->route('stores.index');
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return back();
    }
}
