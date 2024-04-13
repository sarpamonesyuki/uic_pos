<?php

use Illuminate\Support\Facades\Route;

// Added directory to controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Controller;

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

Route::get('/', function () {
    return view('welcome');
});

// dashboard route
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Add needed routes
Route::resource('/products', 'ProductController');
Route::resource('/receipts', 'ReceiptController');
Route::resource('/reports', 'ReportController');
Route::resource('/sales', 'SaleController');

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/add', [Controller::class, 'goToAdd'])->name('add');
Route::post('/add', [ProductController::class, 'store']);

Route::get('/display', [ProductController::class, 'index'])->name('display');

Route::get('/product/{id}', [ProductController::class, 'addItemToCart'])->name('addItem.to.cart');
Route::get('/shopping-cart', [ProductController::class, 'goToProducts'])->name('shopping.cart');
Route::patch('/update-shopping-cart', [ProductController::class, 'updateCart'])->name('update.shopping.cart');
Route::delete('/delete-cart-product', [ProductController::class, 'deleteProduct'])->name('delete.cart.product');