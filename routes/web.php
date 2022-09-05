<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
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
Route::get('/',DashboardController::class)->name('dashboard');
Route::resource('product',ProductController::class);
Route::resource('productgallery',ProductGalleryController::class);
Route::resource('transaction',TransactionController::class);
Route::get('transaction/{id}/status', [TransactionController::class,'status']);
Route::get('product/{id}/gallery',[ProductGalleryController::class, 'gallery']);
Auth::routes(['register' => False]);
