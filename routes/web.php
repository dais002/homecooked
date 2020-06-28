<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::resource('stores', 'StoreController')->except(['edit', 'update']);
    Route::resource('stores.items', 'StoreItemController')->except(['index', 'show']);

    Route::get('cart', 'CartController@index')->name('cart.index');
    Route::put('carts/{cart}/items/{item}', 'CartItemController@update')->name('carts.items.update');
    Route::apiResource('order', 'OrderController')->except(['show', 'update', 'destroy']);
    Route::apiResource('subscribe', 'SubscribeController')->except(['show', 'update', 'destroy']);
});

Route::post('stripe/webhook', 'WebhookController@handleWebhook');

Auth::routes();
