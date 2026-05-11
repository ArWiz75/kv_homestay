<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\Room;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $rooms = Room::all();
    $settings = Setting::all()->pluck('value', 'key');
    return view('welcome', compact('rooms', 'settings'));
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
});

require __DIR__.'/auth.php';
