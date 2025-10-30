<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->middleware('guest')
    ->name('register');
Route::post('/register', [RegisterController::class, 'register'])
    ->middleware('guest');
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest');

Route::get('/home', [HomeController::class, 'index'])
    // ->middleware('auth')
    ->name('home');

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/categories/{category:slug}', [PostController::class, 'postsByCategory'])->name('posts.byCategory');
Route::get('/tags/{tag:slug}', [PostController::class, 'postsByTag'])->name('posts.byTag');
Route::get('/{post:slug}', [PostController::class, 'show'])->name('posts.show');
