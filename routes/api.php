<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// get homepage
Route::get('/stores', 'StoresController@index')->name('stores.index');
// get store
Route::get('/stores/{store}', 'StoresController@show')->name('stores.show');

// cuisines routes
Route::get('/cuisines', "CuisinesController@index");
Route::get('/cuisines/{cuisine}', "CuisinesController@show");
Route::post('/cuisines', "CuisinesController@store");
Route::put('/cuisines/{cuisine}', "CuisinesController@update");
Route::delete('/cuisines/{cuisine}', "CuisinesController@delete");


// register a user - built in?
// logout user - built in?




// user login/authentication routes






Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
