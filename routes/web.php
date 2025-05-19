<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('auth.form');
});

Route::get('/auth', [AuthController::class, 'showLoginRegisterForm'])->name('auth.form');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Middleware\CheckAuthOr404;

Route::middleware([CheckAuthOr404::class])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/about', function(){
        return view('about');
    })->name('about');

    Route::get('/ourteam', function(){
        return view('ourteam');
    })->name('ourteam');
});
