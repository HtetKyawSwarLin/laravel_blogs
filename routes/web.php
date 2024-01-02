<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminBlogController;

// Blogs
Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
//Subscribe
Route::post('/blogs/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandler']);

//Registration
Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


//Comments
Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);

//Admin
Route::middleware('can:admin')->group(function () {
    Route::get('/admin/blogs', [AdminBlogController::class, 'index']);
    Route::get('/admin/blog/create', [AdminBlogController::class, 'create']);
    Route::post('/admin/blog/store', [AdminBlogController::class, 'store']);
    Route::delete('/admin/blogs/{blog:slug}/delete', [AdminBlogController::class, 'destory']);
    Route::get('/admin/blogs/{blog:slug}/edit', [AdminBlogController::class, 'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update', [AdminBlogController::class, 'update']);
});
