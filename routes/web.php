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

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;

// Public Routes
Route::get('/', function () {
    return view('home');
})->name('home');

// Authenticated Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware('admin');

    // Admin Product Management
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/products', [\App\Http\Controllers\AdminProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [\App\Http\Controllers\AdminProductController::class, 'create'])->name('products.create');
        Route::post('/products', [\App\Http\Controllers\AdminProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [\App\Http\Controllers\AdminProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [\App\Http\Controllers\AdminProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [\App\Http\Controllers\AdminProductController::class, 'destroy'])->name('products.destroy');
    });

    Route::get('/shop', [ProductController::class, 'index'])->name('shop');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

    Route::get('/services', function () {
        return view('services');
    })->name('services');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/address', [CartController::class, 'storeAddress'])->name('checkout.storeAddress');
    Route::get('/checkout/confirm', [CartController::class, 'confirm'])->name('checkout.confirm');

    // Order & Payment Routes
    Route::post('/order/process', [\App\Http\Controllers\OrderController::class, 'process'])->name('order.process');
    Route::get('/checkout/success', [\App\Http\Controllers\OrderController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel', [\App\Http\Controllers\OrderController::class, 'cancel'])->name('checkout.cancel');
});

// Stripe Webhook (Handle outside auth middleware)
Route::post('/webhook/stripe', [\App\Http\Controllers\OrderController::class, 'webhook']);
