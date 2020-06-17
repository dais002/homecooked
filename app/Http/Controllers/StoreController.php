<?php

namespace App\Http\Controllers;

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
