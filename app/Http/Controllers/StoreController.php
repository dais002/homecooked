<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Store;

class StoreController extends Controller
{

    public function index()
    {
        $stores = Store::paginate(15);

        return view('stores.index', [
            'stores' => $stores,
        ]);
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(StoreRequest $request)
    {
        Store::create($request->validated());
        return back();
    }

    public function show(Store $store)
    {
        return view('stores.show', [
            'store' => $store,
            'cart' => auth()->user()->cart,
        ]);
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return back();
    }
}
