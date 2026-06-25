<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/books');

Route::resource('categories', CategoryController::class)->except('show');
Route::resource('books', BookController::class)->except('show');
Route::resource('members', MemberController::class)->except('show');
Route::resource('borrowings', BorrowingController::class)->except('show');
