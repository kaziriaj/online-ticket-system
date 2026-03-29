<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SeatController;
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
    Route::get('/events/{event}/edit', [EventController::class,'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class,'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class,'destroy'])->name('event.delete');
    ///schedule
    Route::get('/schedule', [ScheduleController::class,'index'])->name('schedules.index');
    Route::get('/schedule/create', [ScheduleController::class,'create'])->name('schedules.create');
    Route::post('/schedule', [ScheduleController::class,'store'])->name('schedules.store');
    Route::get('/schedule/{schedule}/edit', [ScheduleController::class,'edit'])->name('schedules.edit');
    Route::put('/schedule/{schedule}', [ScheduleController::class,'update'])->name('schedule.update');
    Route::delete('/schedule/{schedule}', [ScheduleController::class,'destroy'])->name('schedules.delete');
    ///seats
    Route::get('/seats', [SeatController::class,'index'])->name('seats.index');
    Route::get('/seats/create', [SeatController::class,'create'])->name('seats.create');
    // Route::post('/seats', [SeatController::class,'store'])->name('seats.store');
    // Route::get('/seats/{seat}/edit', [SeatController::class,'edit'])->name('seats.edit');
    // Route::put('/seats/{seat}', [SeatController::class,'update'])->name('seats.update');
    // Route::delete('/seats/{seat}', [SeatController::class,'destroy'])->name('seats.delete');

});

Route::prefix('manager')->middleware('role:manager')->group(function(){
    Route::get('/dashboard', function(){
        return Inertia::render('Manager/Dashboard');
    })->name('manager.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});
