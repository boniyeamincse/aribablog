<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Blog\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');
