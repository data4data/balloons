<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PilotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BallonController;
use App\Http\Controllers\FestivalDayController;
use App\Http\Controllers\UserController;
use App\Models\Ballon;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/ballons', [BallonController::class, 'index'])->name('ballons.index');
    Route::get('/ballons/create', [BallonController::class, 'create'])->name('ballons.create');
    Route::post('/ballons', [BallonController::class, 'store'])->name('ballons.store');
    Route::put('/ballons/{id}', [BallonController::class, 'update'])->name('ballons.update');
    Route::delete('/ballons/{id}', [BallonController::class, 'destroy'])->name('ballons.destroy');
    Route::get('/ballons/{id}', [BallonController::class, 'getBallon'])->name('ballons.get');
});

Route::middleware('auth')->group(function () {
    Route::get('/festival_days', [FestivalDayController::class, 'index'])->name('festival_days.index');
    Route::get('/festival_days/create', [FestivalDayController::class, 'create'])->name('festival_days.create');
    Route::post('/festival_days', [FestivalDayController::class, 'store'])->name('festival_days.store');
    Route::put('/festival_days/{id}', [FestivalDayController::class, 'update'])->name('festival_days.update');
    Route::delete('/festival_days/{id}', [FestivalDayController::class, 'destroy'])->name('festival_days.destroy');
    Route::get('/festival_days/{id}', [FestivalDayController::class, 'getFestivalDay'])->name('festival_days.get');
});

Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
Route::put('/booking', [BookingController::class, 'save'])->name('booking.save');

Route::middleware('auth')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/create', [BookingController::class, 'createInList'])->name('bookings.create');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('/bookings/{id}', [BookingController::class, 'getBooking'])->name('bookings.get');
});



require __DIR__.'/auth.php';
