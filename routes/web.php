<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');

// });
Route::get('/', function () {
    return view('home');
});
Route::get('/admin', function () {
    return view('layouts.main');
});

Route::get('/register', [AuthController::class, 'showregisterForm'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth'])->get('/dashboard/user', function () {
    return view('booking.index'); // Dashboard user
})->name('user.dashboard');

Route::middleware(['auth', 'role:admin'])->get('/dashboard/admin', function () {
    return view('role.index'); // Dashboard admin
})->name('admin.dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });
});
