<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\Admin\AdminPostController;


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('login', [LoginController::class, 'create']);
    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'destroy']);
});


// Admin 

Route::group(['middleware' => 'admin'], function () {

    Route::post('admin/posts', [AdminPostController::class, 'store']);

    Route::get('admin/posts/create', [AdminPostController::class, 'create']);

    Route::get('admin/posts', [AdminPostController::class, 'index']);

    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);

    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);

    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
});
