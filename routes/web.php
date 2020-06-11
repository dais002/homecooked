<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('cuisines', 'CuisineController');
Route::apiResource('stores', 'StoreController');
Route::resource('stores.items', 'StoreItemController');

// Route::get('stores/{store}/items', 'StoreItemController@index');
// Route::get('stores/{store}/items/{item}', 'StoreItemController@show');
// Route::post('stores/{store}/items', 'StoreItemController@store');
// Route::get('stores/{store}/items/create', 'StoreItemController@create');
// Route::get('stores/{store}/items/{item}/edit', 'StoreItemController@edit');
// Route::match(['put', 'patch'], 'stores/{store}/items/{item}', 'StoreItemController@update');
// Route::delete('stores/{store}/items/{item}', 'StoreItemController@destroy');


Auth::routes();
