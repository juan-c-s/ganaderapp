<?php

// JUANCAMILO
// SIMON
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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');


Route::get('/user/profile', 'App\Http\Controllers\UserController@profile')->name('user.profile');
Route::post('/user/profile/addCash', 'App\Http\Controllers\UserController@addCash')->name('user.addCash');
Route::post('/user/delete', 'App\Http\Controllers\UserController@delete')->name('user.delete');

Route::get('/toggleLang','App\Http\Controllers\HomeController@toggleLang')->name('home.toggleLang');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name('product.save');

Route::middleware('productOwner')->group(function () {
    Route::post('/products/updateProduct', 'App\Http\Controllers\ProductController@updateProduct')->name('product.updateProduct');
    Route::post('/products/delete', 'App\Http\Controllers\ProductController@delete')->name('product.delete');
});
Route::get('/products/update/{id}', 'App\Http\Controllers\ProductController@update')->name('product.update');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

Route::get('/cart', 'App\Http\Controllers\OrderItemController@index')->name('cart.index');
Route::get('/cart/add/{id}', 'App\Http\Controllers\OrderItemController@add')->name('cart.add');
Route::get('/cart/remove/{id}', 'App\Http\Controllers\OrderItemController@remove')->name('cart.remove');
Route::get('/cart/sum/{id}', 'App\Http\Controllers\OrderItemController@sum')->name('cart.sum');
Route::get('/cart/res/{id}', 'App\Http\Controllers\OrderItemController@res')->name('cart.res');
Route::get('/cart/clear', 'App\Http\Controllers\OrderItemController@clear')->name('cart.clear');
Route::post('/cart/checkout', 'App\Http\Controllers\OrderItemController@checkout')->name('cart.checkout');

Route::get('/image', 'App\Http\Controllers\ImageController@index')->name('image.index');
Route::post('/image/save', 'App\Http\Controllers\ImageController@save')->name('image.save');

Route::get('/events', 'App\Http\Controllers\EventController@index')->name('event.index');
Route::get('/events/create', 'App\Http\Controllers\EventController@create')->name('event.create');
Route::post('/events/save', 'App\Http\Controllers\EventController@save')->name('event.save');

Route::post('/reviews/save', 'App\Http\Controllers\ReviewController@save')->name('review.save');

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');
    Route::get('/admin/events', 'App\Http\Controllers\AdminEventController@index')->name('admin.event');

    Route::get('/admin/products', 'App\Http\Controllers\AdminProductController@index')->name('admin.product');
    Route::get('/admin/products/update/{id}', 'App\Http\Controllers\AdminProductController@update')->name('admin.updateProduct');
    Route::get('/admin/events/update/{id}', 'App\Http\Controllers\AdminEventController@update')->name('admin.updateEvent');
    Route::get('/admin/products/create', 'App\Http\Controllers\AdminProductController@create')->name('admin.createProduct');
    Route::get('/admin/events/create', 'App\Http\Controllers\AdminEventController@create')->name('admin.createEvent');
    Route::post('/admin/products/updateProduct', 'App\Http\Controllers\AdminProductController@updateProduct')->name('admin.updateProductDB');
    Route::post('/admin/events/updateEvent', 'App\Http\Controllers\AdminEventController@updateEvent')->name('admin.updateEventDB');
    Route::delete('/admin/products/delete/{id}', 'App\Http\Controllers\AdminProductController@delete')->name('admin.deleteProduct');
    Route::post('/admin/events/save', 'App\Http\Controllers\AdminEventController@save')->name('admin.saveEvent');
    Route::post('/admin/products/save', 'App\Http\Controllers\AdminProductController@save')->name('admin.productSave');
    Route::delete('/admin/events/delete/{id}', 'App\Http\Controllers\AdminEventController@delete')->name('admin.deleteEvent');
});

Auth::routes();
