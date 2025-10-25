<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/categories/{category:slug}', [PostController::class, 'postsByCategory'])->name('posts.byCategory');
Route::get('/tags/{tag:slug}', [PostController::class, 'postsByTag'])->name('posts.byTag');
Route::get('/{post:slug}', [PostController::class, 'show'])->name('posts.show');
