<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerApiController;

/*
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/customers', [CustomerApiController::class, 'index']);

    Route::get('/customers/{customer}', [CustomerApiController::class, 'show']);

    Route::post('/customers', [CustomerApiController::class, 'store']);

    Route::put('/customers/{customer}', [CustomerApiController::class, 'update']);

    Route::delete('/customers/{customer}', [CustomerApiController::class, 'destroy']);
});
*/

// ↓ 一時的に認証なしでアクセスできるようにする
Route::get('/customers', [CustomerApiController::class, 'index']);
Route::get('/customers/{customer}', [CustomerApiController::class, 'show']);
Route::post('/customers', [CustomerApiController::class, 'store']);
Route::put('/customers/{customer}', [CustomerApiController::class, 'update']);
Route::delete('/customers/{customer}', [CustomerApiController::class, 'destroy']);
