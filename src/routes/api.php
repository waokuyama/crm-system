<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerApiController;
use App\Http\Controllers\Api\AuthController;

// ログインAPI（認証不要）
Route::post(
    '/login',
    [AuthController::class, 'login']
);

// 認証が必要なAPI
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/customers', [CustomerApiController::class, 'index']);

    Route::get('/customers/{customer}', [CustomerApiController::class, 'show']);

    Route::post('/customers', [CustomerApiController::class, 'store']);

    Route::put('/customers/{customer}', [CustomerApiController::class, 'update']);

    Route::delete('/customers/{customer}', [CustomerApiController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);

});
