<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::apiResource('stores', 'StoreController')->except(['edit', 'update']); // index, show, destroy 
    Route::resource('stores.items', 'StoreItemController')->except(['index', 'show']); // create, store, edit, update, destroy
    // Route::apiResource('roles.users', 'RoleUserController')->except(['index', 'show', 'destroy']); // store, patch

    Route::get('cart', 'CartController@index')->name('cart.index'); // index
    Route::put('carts/{cart}/items/{item}', 'CartItemController@update')->name('carts.items.update');
    // Route::apiResource('carts.items', 'CartItemController')->except(['index', 'show']); // store, patch, destroy
    Route::apiResource('order', 'OrderController')->except(['show', 'update', 'destroy']); // index, store
    Route::resource('payment', 'PaymentController');
    Route::put('subscribe', 'SubscribeController@update')->name('subscribe');
});

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
