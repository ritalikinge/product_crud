<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavouritProductController;

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
    return view('admin.default');
});

Route::resource('/product', ProductController::class);
Route::get('/favourite_product',[FavouritProductController::class, 'index'])->name('favourite.list');
Route::get('/favourite_product/create',[FavouritProductController::class, 'create'])->name('favourite.create');
Route::post('/favourite_product/create',[FavouritProductController::class, 'store'])->name('favourite.store');








