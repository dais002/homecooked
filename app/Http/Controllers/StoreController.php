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

    public function show(Store $store)
    {
        return view('stores.show', [
            'store' => $store,
            'cart' => auth()->user()->cart,
        ]);
    }

    public function create()
    {
        // $this->authorize('addStore', Store::class);
        return view('stores.create');
    }

    public function store(StoreRequest $request)
    {
        // $this->authorize('addStore', Store::class);
        Store::create($request->validated());
        return redirect()->route('stores.index');
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return back();
    }
}
