<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\Room;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;

Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::get('/old-home', [HomeController::class, 'index'])->name('welcome');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Rooms Routes
    Route::resource('admin/rooms', RoomController::class)->names([
        'index' => 'admin.rooms.index',
        'create' => 'admin.rooms.create',
        'store' => 'admin.rooms.store',
        'edit' => 'admin.rooms.edit',
        'update' => 'admin.rooms.update',
        'destroy' => 'admin.rooms.destroy',
    ]);

    // Admin Settings Routes
    Route::get('admin/settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::put('admin/settings', [SettingController::class, 'update'])->name('admin.settings.update');

    // Admin Reviews Routes
    Route::resource('admin/reviews', AdminReviewController::class)->only(['index', 'destroy'])->names([
        'index' => 'admin.reviews.index',
        'destroy' => 'admin.reviews.destroy',
    ]);
    Route::patch('admin/reviews/{review}/approve', [AdminReviewController::class, 'approve'])->name('admin.reviews.approve');
});

require __DIR__.'/auth.php';
