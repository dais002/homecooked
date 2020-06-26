<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('stores', 'StoreController')->except(['edit', 'update']); // index, show, destroy, create, store
    Route::resource('stores.items', 'StoreItemController')->except(['index', 'show']); // create, store, edit, update, destroy

    Route::get('cart', 'CartController@index')->name('cart.index'); // index
    Route::put('carts/{cart}/items/{item}', 'CartItemController@update')->name('carts.items.update');
    Route::apiResource('order', 'OrderController')->except(['show', 'update', 'destroy']); // index, store

    Route::apiResource('subscribe', 'SubscribeController')->except(['show', 'update', 'destroy']);
});

Route::post('stripe/webhook', 'WebhookController@handleWebhook');

Auth::routes();
