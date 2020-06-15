<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::apiResource('stores', 'StoreController'); // index, show, destroy 
    Route::resource('stores.items', 'StoreItemController'); // create, store, edit, update, destroy
    Route::apiResource('carts', 'CartController'); // index, store, patch, destroy
    Route::apiResource('carts.items', 'CartItemController'); // store, patch
    Route::apiResource('orders', 'OrderController'); // store
});


// Route::get('stores/{store}/items', 'StoreItemController@index');
// Route::get('stores/{store}/items/{item}', 'StoreItemController@show');
// Route::post('stores/{store}/items', 'StoreItemController@store');
// Route::get('stores/{store}/items/create', 'StoreItemController@create');
// Route::get('stores/{store}/items/{item}/edit', 'StoreItemController@edit');
// Route::match(['put', 'patch'], 'stores/{store}/items/{item}', 'StoreItemController@update');
// Route::delete('stores/{store}/items/{item}', 'StoreItemController@destroy');


Auth::routes();
