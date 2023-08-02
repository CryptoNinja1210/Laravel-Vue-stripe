<?php

use App\Http\Controllers\CartsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
// use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[ProductsController::class,'index']);
// Route::get('/{any?}', function () {
//     return view('product');
// });
Auth::routes();

Route::post('/cart', [CartsController::class, 'store'])->name('cart');
Route::get('/checkout', [CartsController::class, 'index'])->name('checkout');

// Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

Route::get('/checkout/get/items', [CartsController::class, 'getCartItemsforCheckout']);
Route::post('/process/user/payment', [CartsController::class, 'processPayment']);

