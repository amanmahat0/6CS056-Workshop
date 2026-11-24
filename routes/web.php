<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AccountController;





Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class)
    ->middleware('can:institution-only');
    Route::resource('courses', CourseController::class);

    Route::get('/account', [AccountController::class, 'show'])->name('account.show');
});


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'choose'])->name('register');

    Route::get('/register/student', [RegisterController::class, 'showStudentForm'])
        ->name('register.student');
    Route::post('/register/student', [RegisterController::class, 'registerStudent'])
        ->name('register.student.store');

    Route::get('/register/institution', [RegisterController::class, 'showInstitutionForm'])
        ->name('register.institution');
    Route::post('/register/institution', [RegisterController::class, 'registerInstitution'])
        ->name('register.institution.store');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');