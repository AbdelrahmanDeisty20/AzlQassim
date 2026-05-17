<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ClickController;

// --- Frontend Multi-Page Routes ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/services/{id}', [HomeController::class, 'serviceDetail'])->name('service.detail');
Route::get('/areas', [HomeController::class, 'areas'])->name('areas');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// --- Guest AJAX submissions ---
Route::post('/requests', [RequestController::class, 'store']);
Route::post('/messages', [MessageController::class, 'store']);
Route::post('/clicks', [ClickController::class, 'store']);

// --- Admin Interface & AJAX Operations ---
Route::prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/login', [\App\Http\Controllers\AdminController::class, 'login']);
    Route::get('/settings', [\App\Http\Controllers\AdminController::class, 'settings']);
    Route::get('/services', [\App\Http\Controllers\AdminController::class, 'services']);
    Route::get('/offers', [\App\Http\Controllers\AdminController::class, 'offers']);
    Route::get('/areas', [\App\Http\Controllers\AdminController::class, 'areas']);
    Route::get('/testimonials', [\App\Http\Controllers\AdminController::class, 'testimonials']);
    Route::get('/faqs', [\App\Http\Controllers\AdminController::class, 'faqs']);
    Route::get('/gallery', [\App\Http\Controllers\AdminController::class, 'gallery']);
    Route::get('/blogs', [\App\Http\Controllers\AdminController::class, 'blogs']);
    Route::get('/requests', [\App\Http\Controllers\AdminController::class, 'requests']);
    Route::get('/messages', [\App\Http\Controllers\AdminController::class, 'messages']);

    // Admin Customization & Settings APIs
    Route::post('/settings/{key}', [\App\Http\Controllers\AdminController::class, 'saveSetting']);
    Route::post('/content/{type}', [\App\Http\Controllers\AdminController::class, 'saveContent']);
    Route::delete('/content/{type}/{id}', [\App\Http\Controllers\AdminController::class, 'deleteContent']);
    Route::post('/menu/reorder', [\App\Http\Controllers\AdminController::class, 'reorderMenu']);

    Route::post('/requests/{id}/status', [\App\Http\Controllers\AdminController::class, 'updateRequestStatus']);
    Route::delete('/requests/{id}', [\App\Http\Controllers\AdminController::class, 'deleteRequest']);

    Route::post('/messages/{id}/reply', [\App\Http\Controllers\AdminController::class, 'updateMessageReply']);
    Route::delete('/messages/{id}', [\App\Http\Controllers\AdminController::class, 'deleteMessage']);

    Route::post('/upload', [\App\Http\Controllers\AdminController::class, 'uploadImage']);
    Route::get('/logs', [\App\Http\Controllers\AdminController::class, 'getLogs']);
    Route::get('/state', [\App\Http\Controllers\AdminController::class, 'getState']);
});

// --- Fallback Route for non-existent pages ---
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
