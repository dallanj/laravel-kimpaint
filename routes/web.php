<?php

use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\Frontpage;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/pages', 'admin.pages')->name('pages');
    Route::view('/navigation-menus', 'admin.navigation-menus')->name('navigation-menus');
    Route::view('/blogs', 'admin.blogs')->name('blogs');
    Route::view('/categories', 'admin.categories')->name('categories');
    Route::view('/gallery', 'admin.gallery')->name('gallery');
    Route::view('/testimonials', 'admin.testimonials')->name('testimonials');
});

Route::get('/', Frontpage::class)->name('home');

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('show');
});

Route::get('/contact-us', [ContactUsFormController::class, 'create'])->name('contact.create');
Route::post('/contact-us', [ContactUsFormController::class, 'store'])->name('contact.store');

// CMS pages must remain last so they do not shadow explicit application routes.
Route::get('/{urlslug}', Frontpage::class)
    ->where('urlslug', '[A-Za-z0-9\-]+')
    ->name('pages.show');
