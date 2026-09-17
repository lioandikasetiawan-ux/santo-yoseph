<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\PublicController;

// Halaman Utama Sementara
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PublicController::class, 'index'])->name('public.home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/jadwal-misa', [PublicController::class, 'schedules'])->name('public.schedules');
Route::get('/pengumuman', [PublicController::class, 'announcements'])->name('public.announcements');
Route::get('/pengumuman/{slug}', [PublicController::class, 'announcementDetail'])->name('public.announcements.detail');
Route::get('/agenda', [PublicController::class, 'events'])->name('public.events');
Route::get('/agenda/{slug}', [PublicController::class, 'eventDetail'])->name('public.events.detail');
Route::get('/galeri', [PublicController::class, 'galleries'])->name('public.galleries');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('announcements', AnnouncementController::class);
    Route::resource('events', EventController::class);
    Route::resource('galleries', GalleryController::class);

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // CRUD Schedules
        Route::resource('schedules', ScheduleController::class);
    });
});