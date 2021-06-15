<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', 'ProductController@index')->name('products');
    Route::get('/product/{id}', 'ProductController@show')->name('product');
    Route::get('/cart', 'ProductController@getCart')->name('getCart');
    Route::delete('remove-from-cart', 'ProductController@removeFromCart')->name('remove-from-cart');
