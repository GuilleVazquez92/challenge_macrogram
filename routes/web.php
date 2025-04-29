<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthorController;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Web\AuthWebController;

Route::resource('authors', AuthorController::class)->middleware('auth');
Route::resource('books', BookController::class)->middleware('auth');

Route::get('/', function () {
    return view('home');
});


Route::get('/login', [AuthWebController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthWebController::class, 'login']);

Route::get('/register', [AuthWebController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthWebController::class, 'register']);

Route::post('/logout', [AuthWebController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');