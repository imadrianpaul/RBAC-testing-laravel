<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['checkrole:admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index']);
});

// ------------

// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/orders', [OrderController:: class, 'index']);