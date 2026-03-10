<?php

use Illuminate\Support\Facades\Route;
use App\Modules\SEO\Controllers\SitemapController;

Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
