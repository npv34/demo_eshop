<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'index'])->name('home.index');

Route::prefix('cart')->group(function () {
    Route::get('/',[CartController::class, 'index'])->name('cart.index');
    Route::get('/add-to-cart/{productId}',[CartController::class, 'addToCart'])->name('cart.addToCart');

});
