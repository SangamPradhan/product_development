<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'home'])->name('front.home');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/services', [FrontController::class, 'services'])->name('front.services');
Route::get('/projects', [FrontController::class, 'projects'])->name('front.projects');
Route::get('/projects/{slug}', [FrontController::class, 'projectDetail'])->name('front.project.detail');
Route::get('/events', [FrontController::class, 'events'])->name('front.events');
Route::get('/events/{slug}', [FrontController::class, 'eventDetail'])->name('front.event.detail');
Route::get('/gallery', [FrontController::class, 'gallery'])->name('front.gallery');
Route::get('/gallery/section', [FrontController::class, 'gallerySection'])->name('front.gallery.section');
Route::get('/blogs', [FrontController::class, 'blogs'])->name('front.blogs');
Route::get('/blogs/{slug}', [FrontController::class, 'blogDetail'])->name('front.blog.detail');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::post('/contact', [FrontController::class, 'contactStore'])->name('front.contact.store');
Route::post('/events/{id}/book', [FrontController::class, 'bookEvent'])->name('front.event.book');

Route::post('/chatbot/stream', [ChatbotController::class, 'stream'])
    ->name('chatbot.stream')
    ->middleware('web');

Route::get('/chatbot/history', [ChatbotController::class, 'history'])
    ->name('chatbot.history')
    ->middleware('web');

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
        Route::get('/news/{id}', [AdminController::class, 'newsShow'])->name('admin.news.show');
        Route::get('/news/{id}/edit', [AdminController::class, 'newsEdit'])->name('admin.news.edit');
        Route::put('/news/{id}/update', [AdminController::class, 'newsUpdate'])->name('admin.news.update');
        Route::delete('/news/{id}/delete', [AdminController::class, 'newsDelete'])->name('admin.news.delete');

        // Projects admin UI (data via REST API)
        Route::resource('projects', ProjectController::class, ['as' => 'admin'])
            ->only(['index', 'create', 'edit', 'show']);

        // Reviews admin UI (server-side Blade)
        Route::get('/reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
        Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('admin.reviews.show');
        Route::post('/reviews/{review}/accept', [ReviewController::class, 'accept'])->name('admin.reviews.accept');
        Route::post('/reviews/{review}/reject', [ReviewController::class, 'reject'])->name('admin.reviews.reject');
        Route::delete('/reviews/{review}/delete', [ReviewController::class, 'delete'])->name('admin.reviews.delete');

        // Event Bookings dashboard
        Route::get('/bookings', [AdminController::class, 'bookingsIndex'])->name('admin.bookings.index');
        Route::get('/bookings/{booking}', [AdminController::class, 'bookingShow'])->name('admin.bookings.show');
        Route::delete('/bookings/{booking}/delete', [AdminController::class, 'bookingDelete'])->name('admin.bookings.delete');

        // Contact / Inquiries dashboard
        Route::get('/contacts', [AdminController::class, 'contactsIndex'])->name('admin.contacts.index');
        Route::get('/contacts/{contact}', [AdminController::class, 'contactShow'])->name('admin.contacts.show');
        Route::delete('/contacts/{contact}/delete', [AdminController::class, 'contactDelete'])->name('admin.contacts.delete');

        // Services CRUD
        Route::resource('services', ServiceController::class, ['as' => 'admin']);

        // Events CRUD
        Route::resource('events', EventController::class, ['as' => 'admin']);

        // Blogs CRUD
        Route::resource('blogs', BlogController::class, ['as' => 'admin']);

        // Gallery CRUD
        Route::resource('gallery', GalleryController::class, ['as' => 'admin']);
    });
});
