<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermitController;
use App\Http\Controllers\PropertyController; // Assuming you'll create this later

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ALL authenticated and verified routes go INSIDE this group:
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard'); // Default user dashboard
    })->name('dashboard');

    // Admin routes (still require authentication and verification, PLUS the 'admin' middleware)
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        // Add other admin routes here
    });

    // --- Permit Routes ---
    Route::resource('permits', PermitController::class); // This is ALL you need for permits

    // --- Property Routes (Example - adapt as needed) ---
    Route::resource('property', PropertyController::class); // This is ALL you need for properties

    // Add other routes that require authentication and verification HERE
});

// Routes that only require authentication (but not verification) go in this separate group:
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';