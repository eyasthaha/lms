<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
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

    Route::get('/courses', [CourseController::class, 'index'])->name('courses.list');

    Route::get('/course', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/course', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/course/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::patch('/course/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/course/{id}', [CourseController::class, 'destory'])->name('courses.destroy');

});

//User Routes
Route::middleware(['auth', 'role:student'])->group(function () {

    Route::get('/home', [StudentController::class, 'index'])->name('home');

    Route::post('/enroll', [StudentController::class, 'enroll'])->name('student.enroll');

    Route::get('payment-success', function () {
        return view('payment');
    })->name('payment.index');

    Route::get('/my-courses', [StudentController::class, 'courses'])->name('student.courses');

    Route::get('/api/courses', [CourseController::class, 'courseDetails'])->name('courses.details');

    Route::get('/search', [CourseController::class, 'search'])->name('courses.search');


});