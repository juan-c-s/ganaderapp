<?php

/** Donovan Castrillon */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/events', 'App\Http\Controllers\api\EventApiController@getAllEvents')->name('event.api.all');
Route::post('/events/dateFilter', 'App\Http\Controllers\api\EventApiController@dateFilter')->name('event.api.dateFilter');
Route::get('/products', 'App\Http\Controllers\api\ProductApiController@getAllProducts')->name('product.api.all');
Route::post('/products/supplierFilter', 'App\Http\Controllers\api\ProductApiController@supplierFilter')->name('product.api.supplierFilter');
