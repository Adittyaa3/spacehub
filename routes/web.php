<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('welcome');

// });
Route::get('/', function () {
    return view('home');
});
Route::get('/admin', function () {
    return view('layouts.main');
});
Route::get('/denah', function () {
    return view('denah.index');
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
        Route::get('dashboard/payment', [UserController::class, 'dashboardpayment'])->name('chart');



        // Menampilkan daftar semua rooms
        Route::get('rooms', [RoomController::class, 'index'])->name('rooms.index');

        // Menampilkan form untuk membuat room baru
        Route::get('rooms/create', [RoomController::class, 'create'])->name('rooms.create');

        // Menyimpan room baru
        Route::post('rooms', [RoomController::class, 'store'])->name('rooms.store');

        // Menampilkan form untuk mengedit room tertentu
        Route::get('rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');

        // Memperbarui room tertentu
        Route::put('rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');

        // Menghapus room tertentu
        Route::delete('rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');


        // Routes for Categories
        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::get('bookings/create/{room}', [BookingController::class, 'create'])->name('bookings.create');
        Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');



        Route::get('bookingsindex', [BookingController::class, 'index'])->name('bookings.index');
        Route::get('bookings/create', [BookingController::class, 'create'])->name('bookings.create');
        Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
        Route::get('bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
        Route::put('bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
        Route::delete('bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

        Route::get('carts', [CartController::class, 'index'])->name('carts.index');
Route::post('carts/{roomId}', [CartController::class, 'addToCart'])->name('carts.add');
Route::delete('carts/{cartId}', [CartController::class, 'removeFromCart'])->name('carts.remove');
Route::post('carts/checkout', [CartController::class, 'checkout'])->name('carts.checkout');


        // Route::get('payments/create/{booking_id}', [PaymentController::class, 'create'])->name('payments.create');
        // Route::post('payments', [PaymentController::class, 'store'])->name('payments.store');
        // Route::post('payments/callback', [PaymentController::class, 'callback'])->name('payments.callback');
        Route::get('/payments/create/{booking_id}', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store');
Route::post('/payments/callback', [PaymentController::class, 'callback'])->name('payments.callback');
Route::get('/payments/finish', [PaymentController::class, 'finishPayment'])->name('payments.finish');
Route::get('/payments/unfinish', [PaymentController::class, 'unfinishPayment'])->name('payments.unfinish');
Route::get('/payments/error', [PaymentController::class, 'errorPayment'])->name('payments.error');

Route::get('/transactions', [BookingController::class, 'transactionHistory'])->name('transactions.history');
// Route::get('/bookings', [BookingController::class, 'showRooms'])->name('bookings.showRooms');
// Route::post('/bookings/{room}', [BookingController::class, 'bookRoom'])->name('bookings.bookRoom');
Route::get('/bookings', [BookingController::class, 'showRooms'])->name('bookings.showRooms');
Route::get('/bookings/create/{room}', [BookingController::class, 'createBooking'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'storeBooking'])->name('bookings.store');
Route::get('/bookingslist', [BookingController::class, 'indexbookinglist'])->name('bookings.list');

Route::get('/bookings/booked-rooms', [BookingController::class, 'bookedRooms'])->name('bookings.bookedRooms');
});

