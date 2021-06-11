<?php

use App\Http\Controllers\AuthController;
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
    Route::get('/update/{productId}',[CartController::class, 'updateQuantityProduct'])->name('cart.updateQuantityProduct');

});

Route::get('admin/login', [AuthController::class, 'showFormLogin'])->name('auth.showFormLogin');
Route::post('admin/login', [AuthController::class, 'login'])->name('auth.login');


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin.index');

    Route::get('logout', [AuthController::class,'logout'])->name('auth.logout');
    Route::get('change-password', [AuthController::class,'changePassword'])->name('auth.changePassword');
});
