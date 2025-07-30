<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Exception;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/product/{slug}', [HomeController::class, 'product'])->name('product');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');

Route::get('/admin', function () {
    return redirect('/admin');
})->name('admin');

// Health check route for Railway
Route::get('/health', function () {
    return response()->json(['status' => 'ok', 'message' => 'Silbele is running']);
});

// Fallback health check (even simpler)
Route::get('/ping', function () {
    return 'pong';
});
