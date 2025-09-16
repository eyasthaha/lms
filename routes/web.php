<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/register', [AuthController::class, 'store'])->name('register.post');

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.get');
// Route::post('/login', [AuthController::class, 'login'])->name('login');