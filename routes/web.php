<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Homepage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['role:user', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->middleware('role:admin')->group(function(){
    Route::get('/dashboard', [AdminDashboardController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/events', [EventController::class,'index'])->name('events.index');
    Route::get('/events/create', [EventController::class,'create'])->name('events.create');
    Route::post('/events', [EventController::class,'store'])->name('events.store');

});

Route::prefix('manager')->middleware('role:manager')->group(function(){
    Route::get('/dashboard', function(){
        return Inertia::render('Manager/Dashboard');
    })->name('manager.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});
