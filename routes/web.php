<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/homepage', [HomepageController::class, 'home']);

    Route::get('/books', [BookController::class, 'index']);

    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users/store', [UserController::class, 'store']);
    Route::get('/users/delete/{id}', [UserController::class, 'delete']);
    Route::post('/books/store', [BookController::class, 'store']);
    Route::get('/books/delete/{id}', [BookController::class, 'delete']);

    // Transaction
    Route::get('/books/transaction', [TransactionController::class, 'index']);
    Route::post('/books/transaction/create', [TransactionController::class, 'create']);
    Route::get('books/transaction/{id_transaction}', [TransactionController::class, 'chart']);
});
