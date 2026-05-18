<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\AdminController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    
    // --- Routes Utilisateur (Client) ---
    Route::get('/dashboard', [IncidentController::class, 'index'])->name('dashboard');
    Route::get('/incidents/create', [IncidentController::class, 'create'])->name('incidents.create');
    Route::post('/incidents', [IncidentController::class, 'store'])->name('incidents.store');
    Route::get('/incidents/{incident}', [IncidentController::class, 'show'])->name('incidents.show');

    // --- Routes Technicien ---
    Route::get('/technicien/dashboard', [TechnicianController::class, 'index'])->name('technician.dashboard');
    Route::post('/technicien/incidents/{incident}/take', [TechnicianController::class, 'takeIncident'])->name('technician.take');
    Route::post('/technicien/incidents/{incident}/status', [TechnicianController::class, 'updateStatus'])->name('technician.status');

    // --- Routes Admin ---
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/users/{user}/role', [AdminController::class, 'updateRole'])->name('admin.role');
    Route::post('/admin/users/create', [AdminController::class, 'storeUser'])->name('admin.users.store');

    // --- Profile (Breeze par défaut) ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/technicien/dashboard', [TechnicianController::class, 'index'])->name('technician.dashboard');
    Route::post('/technicien/incidents/{incident}/take', [TechnicianController::class, 'takeIncident'])->name('technician.take');
    Route::post('/technicien/incidents/{incident}/resolve', [TechnicianController::class, 'resolveIncident'])->name('technician.resolve');
});

require __DIR__.'/auth.php';