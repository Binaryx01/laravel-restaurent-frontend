<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Your custom routes for the menu pages
Route::get('/starter', function () {
    return view('starter');
})->name('starter');

Route::get('/main-course', function () {
    return view('main-course');
})->name('main-course');

Route::get('/drinks', function () {
    return view('drinks');
})->name('drinks');

// Ensure auth.php is loaded at the end
require __DIR__.'/auth.php';
