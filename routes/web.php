<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\SavedDestinationController;
use App\Http\Controllers\AdminController;

// Public home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (requires auth + email verification)
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware(['auth', 'verified', '2fa.confirmed'])
    ->name('dashboard');


// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Trips
    Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
    Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
    Route::post('/trips', [TripController::class, 'store'])->name('trips.store');
    Route::get('/trips/{trip}/edit', [TripController::class, 'edit'])->name('trips.edit');
    Route::put('/trips/{trip}', [TripController::class, 'update'])->name('trips.update');
    Route::delete('/trips/{trip}', [TripController::class, 'destroy'])->name('trips.destroy');

    // Saved Destinations
    Route::get('/destinations/saved', [SavedDestinationController::class, 'index'])->name('destinations.saved');
    Route::post('/destinations/save', [SavedDestinationController::class, 'store'])->name('destinations.save');
    Route::delete('/destinations/{destination}', [SavedDestinationController::class, 'destroy'])->name('destinations.destroy');
    Route::put('/destinations/{destination}', [SavedDestinationController::class, 'update'])->name('destinations.update');

    // Admin-only routes
    Route::middleware(['verified', 'admin'])->group(function () {
        // Admin Dashboard
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Admin: Manage Users
        Route::get('/admin/users/{user}', [AdminController::class, 'showUser'])->name('admin.users.show');
        Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
        Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
        Route::put('/admin/users/{user}/toggle-role', [AdminController::class, 'toggleRole'])->name('admin.toggleRole');
        Route::delete('/admin/users/{user}', [AdminController::class, 'delete'])->name('admin.delete');

        // Admin: Manage Trips
        Route::get('/admin/trips/{trip}/edit', [AdminController::class, 'editTrip'])->name('admin.trips.edit');
        Route::put('/admin/trips/{trip}', [AdminController::class, 'updateTrip'])->name('admin.trips.update');
    });
});

// Fortify handles the /two-factor-challenge route internally.
// No need to define it manually here.

require __DIR__.'/auth.php';
