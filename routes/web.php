<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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



        // Rute untuk menampilkan daftar pengguna
        Route::get('users', [UserController::class, 'index'])->name('users.index');

        // Rute untuk menampilkan form untuk membuat pengguna baru
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');

        // Rute untuk menyimpan pengguna baru
        Route::post('users', [UserController::class, 'store'])->name('users.store');

        // Rute untuk menampilkan form untuk mengedit pengguna
        Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

        // Rute untuk mengupdate pengguna
        Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');

        // Rute untuk menghapus pengguna
        Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        // ini untuk masing" chart
        Route::get('chart', [UserController::class, 'chartData'])->name('chart');

});
