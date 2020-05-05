<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'ProductController@index')->name('home');

Auth::routes();

Route::get('/home', 'ProductController@index')->name('home');

Auth::routes();

Route::get('/home', 'ProductController@index')->name('home');

Auth::routes();

Route::get('/home', 'ProductController@index')->name('home');

Route::resource('productos','ProductController');

Auth::routes();

Route::get('/home', 'ProductController@index')->name('home');

Route::resource("in_shopping_carts","ProductInShoppingCartsController",[
    "only" => ["store","destroy"]
]);

Route::get('/carrito/productos','ShoppingCartController@products')->name('shopping_cart.products');

Route::get('/carrito','ShoppingCartController@show')->name('shopping_cart.show');

