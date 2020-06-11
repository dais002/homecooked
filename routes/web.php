<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('cuisines', 'CuisineController');
Route::apiResource('stores', 'StoreController');
Route::apiResource('stores.items', 'StoreItemController');

// i added this route but can't seem to route to it correctly...
// displays in route:list as 'stores.items.create' endpoint
// i want to change the endpoint but then my route in show.blade breaks
Route::get('stores.items.create', "StoreItemController@create")
    ->name('stores.items.create');


Auth::routes();
