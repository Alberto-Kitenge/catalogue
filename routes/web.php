<?php

use App\Http\Controllers\AdminController;
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

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Route::patch('/home', [HomeController::class, 'updatePassword'])
    ->middleware('auth');


Route::resource('/admin/posts', AdminController::class)
    ->middleware('admin')
    ->except('show')
    ->names('admin.posts');


Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/categories/{category:slug}', [PostController::class, 'postsByCategory'])->name('posts.byCategory');
Route::get('/tags/{tag:slug}', [PostController::class, 'postsByTag'])->name('posts.byTag');
Route::get('/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/{post:slug}/comment', [PostController::class, 'comment'])
    ->middleware('auth')
    ->name('posts.comment');
