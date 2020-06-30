<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Store;
use Carbon\Carbon;

class Stores
{
    const CACHE_KEY = 'STORES';

    public function allStores(Request $request, $order)
    {
        $key = "all.{$order}";
        $cacheKey = $this->getCacheKey($key);

        return cache()->remember($cacheKey, Carbon::now()->addSeconds(5), function () use ($request, $order) {
            return Store::search($request->search)->orderBy($order)->get();
        });
    }

    // not needed as store is already passed in.
    public function getStore($store)
    {
        $key = "get.{$store->id}";
        $cacheKey = $this->getCacheKey($key);

        return cache()->remember($cacheKey, Carbon::now()->addSeconds(5), function () use ($store) {
            return Store::find($store->id);
        });
    }

    public function getCacheKey($key)
    {
        $key = strtoupper($key);
        return self::CACHE_KEY . ".$key";
    }
}
