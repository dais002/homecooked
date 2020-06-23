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

Route::post('stripe/webhook', '\App\Http\Controllers\WebhookController@handleWebhook');

/*
Admin/Manager Actions -
Store - show all stores, show a single store, delete a store (admin role)
StoresItems - create item, store item, edit item, update item, delete item (manager role)
RolesUsers - assign role to user, update role to user (when user upgrades to paid package)

Customer Actions -
CartsItems - show all cart items, add to cart, update cart (customer), remove item from cart
Orders - complete the purchase (customer)
*/



Auth::routes();
