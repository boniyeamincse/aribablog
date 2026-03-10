<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Categories\Controllers\TaxonomyController;

Route::get('category/{slug}', [TaxonomyController::class, 'category'])->name('category.show');
Route::get('tag/{slug}', [TaxonomyController::class, 'tag'])->name('tag.show');
