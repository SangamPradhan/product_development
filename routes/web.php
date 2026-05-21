<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'home'])->name('front.home');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/services', [FrontController::class, 'services'])->name('front.services');
Route::get('/projects', [FrontController::class, 'projects'])->name('front.projects');
Route::get('/projects/{slug}', [FrontController::class, 'projectDetail'])->name('front.project.detail');
Route::get('/events', [FrontController::class, 'events'])->name('front.events');
Route::get('/events/detail', [FrontController::class, 'eventDetail'])->name('front.event.detail');
Route::get('/gallery', [FrontController::class, 'gallery'])->name('front.gallery');
Route::get('/blogs', [FrontController::class, 'blogs'])->name('front.blogs');
Route::get('/blogs/detail', [FrontController::class, 'blogDetail'])->name('front.blog.detail');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');

// Admin Dashboard & Auth Routes
Route::prefix('admin')->group(function () {
    // Guest Admin Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
        Route::post('/login', [AdminController::class, 'login']);
    });

    // Authenticated Admin Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // News/Blogs Resource CRUD Templates Showcase
        Route::get('/news', [AdminController::class, 'newsIndex'])->name('admin.news.index');
        Route::get('/news/create', [AdminController::class, 'newsCreate'])->name('admin.news.create');
        Route::post('/news/store', [AdminController::class, 'newsStore'])->name('admin.news.store');
        Route::get('/news/{id}/edit', [AdminController::class, 'newsEdit'])->name('admin.news.edit');
        Route::put('/news/{id}/update', [AdminController::class, 'newsUpdate'])->name('admin.news.update');
        Route::delete('/news/{id}/delete', [AdminController::class, 'newsDelete'])->name('admin.news.delete');

        // Projects admin UI (data via REST API)
        Route::resource('projects', ProjectController::class, ['as' => 'admin'])
            ->only(['index', 'create', 'edit']);
    });
});
