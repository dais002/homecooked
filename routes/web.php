<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('cuisines', 'CuisineController');
Route::apiResource('stores', 'StoreController');
Route::apiResource('stores.items', 'StoreItemController');

// would love the endpoint to be /stores/{store}/items/create but can't get it to work properly...
Route::get('stores.items.create', "StoreItemController@create")
    ->name('stores.items.create');




Auth::routes();
