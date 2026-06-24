<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    // 一覧表示（一般ユーザーも閲覧可能）
    Route::get(
        '/customers',
        [CustomerController::class, 'index']
    );

    // 新規登録（管理者のみ）
    Route::get(
        '/customers/create',
        [CustomerController::class, 'create']
    )->middleware('admin');

    Route::post(
        '/customers',
        [CustomerController::class, 'store']
    )->middleware('admin');

    // 編集（管理者のみ）
    Route::get(
        '/customers/{id}/edit',
        [CustomerController::class, 'edit']
    )->middleware('admin');

    Route::put(
        '/customers/{id}',
        [CustomerController::class, 'update']
    )->middleware('admin');

    // 削除（管理者のみ）
    Route::delete(
        '/customers/{id}',
        [CustomerController::class, 'destroy']
    )->middleware('admin');
});

require __DIR__.'/auth.php';
