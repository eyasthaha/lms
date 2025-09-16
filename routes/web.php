<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.get');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

});

//User Routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});