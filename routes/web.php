<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'home'])->name('front.home');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/services', [FrontController::class, 'services'])->name('front.services');
Route::get('/projects', [FrontController::class, 'projects'])->name('front.projects');
Route::get('/projects/detail', [FrontController::class, 'projectDetail'])->name('front.project.detail');
Route::get('/events', [FrontController::class, 'events'])->name('front.events');
Route::get('/events/detail', [FrontController::class, 'eventDetail'])->name('front.event.detail');
Route::get('/gallery', [FrontController::class, 'gallery'])->name('front.gallery');
Route::get('/blogs', [FrontController::class, 'blogs'])->name('front.blogs');
Route::get('/blogs/detail', [FrontController::class, 'blogDetail'])->name('front.blog.detail');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
