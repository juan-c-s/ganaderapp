<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create");
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save");
Route::post('/products/delete', 'App\Http\Controllers\ProductController@delete')->name("product.delete");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/cart', 'App\Http\Controllers\OrderItemController@index')->name("cart.index");
Route::get('/cart/add/{id}', 'App\Http\Controllers\OrderItemController@add')->name("cart.add");
Route::get('/cart/removeAll/', 'App\Http\Controllers\OrderItemController@removeAll')->name("cart.removeAll");

Route::get('/image', 'App\Http\Controllers\ImageController@index')->name("image.index");
Route::post('/image/save', 'App\Http\Controllers\ImageController@save')->name("image.save");

Route::get('/events', 'App\Http\Controllers\EventController@index')->name("event.index");
Route::get('/events/create', 'App\Http\Controllers\EventController@create')->name("event.create");
Route::post('/events/save', 'App\Http\Controllers\EventController@save')->name("event.save");
Route::post('/events/dateFilter', 'App\Http\Controllers\EventController@dateFilter')->name('event.dateFilter');

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name("admin.index");
    Route::post('/admin/deleteEvent', 'App\Http\Controllers\AdminController@deleteEvent')->name("admin.deleteEvent");
    Route::post('/admin/deleteProduct', 'App\Http\Controllers\AdminController@deleteProduct')->name("admin.deleteProduct");
});

Auth::routes();