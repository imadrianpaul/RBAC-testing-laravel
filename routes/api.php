<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductStoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/createfacilitator', [AdminController::class, 'createfacilitator']);
Route::post('/deletefacilitator', [AdminController::class, 'deletefacilitator']);

Route::get('/products', [ProductController::class, 'index']);

Route::post('/products', [ProductController::class, 'store']);

Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);

// Route::get('/customer-register', [UserController::class,'register']);
Route::post('/register', [UserController::class, 'register']);

Route::get('login', [UserController::class, 'login']);
Route::post('login', [UserController::class, 'login']);