<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Welcome Page
Route::get('/', [PostController::class, 'home'])->name('home')->middleware('guest');


Route::middleware('auth')->group(function(){
    Route::resource('post', PostController::class);
    Route::get('/profile/{user}', [UserController::class, 'profile'])->name('users.profile');
});

// Authentication routes
Route::middleware('guest')->controller(AuthController::class)->group(function(){
    // Register Page
    Route::get('/auth/register', 'authRegister')->name('auth.register');

    // Login Page
    Route::get('/auth/login', 'authLogin')->name('auth.login');

    // Register Submission
    Route::post('/auth/register', 'register')->name('register');
    
    // Login Submission
    Route::post('/auth/login', 'login')->name('login');
    });

// // Logout
Route::post('/auth/logout', [AuthController::class, 'authLogout'])->name('auth.logout');