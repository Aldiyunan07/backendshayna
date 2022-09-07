<?php

use App\Http\Controllers\API\ChechkoutController;
use App\Http\Controllers\API\ProdukController;
use App\Http\Controllers\API\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('products',[ProdukController::class,'all']);
Route::post('checkout',[ChechkoutController::class,'checkout']);
Route::get('transactions/{id}',[TransactionController::class,'get']);