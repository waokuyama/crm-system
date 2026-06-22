<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

// 一覧表示
Route::get('/customers', [CustomerController::class, 'index']);

// 新規登録
Route::get('/customers/create', [CustomerController::class, 'create']);
Route::post('/customers', [CustomerController::class, 'store']);

// 編集
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit']);
Route::put('/customers/{id}', [CustomerController::class, 'update']);

// 削除
Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);
