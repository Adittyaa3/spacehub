<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel Roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Menggunakan 'id' sebagai primary key
            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Tabel Users (sesuai dengan struktur Laravel dan kolom tambahan)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number', 15)->nullable();
            $table->string('institution')->nullable();
            $table->foreignId('role_id')->nullable()->constrained('roles')->nullOnDelete(); // foreign key yang sesuai dengan kolom 'id' di roles
            $table->rememberToken();
            $table->timestamps();
        });

        // Tabel Password Reset Tokens (bawaan Laravel)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Tabel Sessions (bawaan Laravel)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // Tabel Menus
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon', 50)->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->char('status', 1);
            $table->timestamps();
        });

        // Tabel Role_Menu
        Schema::create('role_menu', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
            $table->primary(['role_id', 'menu_id']);
        });

        // Tabel Rooms
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('capacity');
            $table->char('status', 1)->default('A'); // 'A' untuk Available, 'B' untuk Booked
            $table->timestamps();
        });

        // Tabel Bookings
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('booking_date');
            $table->char('payment_status', 1)->default('U'); // 'P' untuk Paid, 'U' untuk Unpaid
            $table->timestamps();
        });

        // Tabel Booking_Rooms
        Schema::create('booking_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->timestamps();
        });

        // Tabel Booking_Cards
        Schema::create('booking_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
            $table->string('qr_code');
            $table->timestamps();
        });

        // Tabel Payments dengan detail pembayaran
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
            $table->dateTime('payment_date');
            $table->decimal('amount', 10, 2);
            $table->string('payment_method', 50)->nullable(); // Contoh: 'Credit Card', 'Bank Transfer'
            $table->char('payment_status', 1)->default('U'); // 'P' untuk Paid, 'U' untuk Unpaid, 'C' untuk Canceled, 'F' untuk Failed
            $table->string('transaction_id')->nullable(); // ID transaksi dari payment gateway
            $table->text('description')->nullable(); // Opsional, untuk deskripsi transaksi
            $table->timestamps();
        });

        // Tabel Room_Accesses untuk akses ruangan
        Schema::create('room_accesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
            $table->string('access_code');
            $table->char('access_status', 1)->default('A'); // 'A' untuk Active, 'E' untuk Expired
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_accesses');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('booking_cards');
        Schema::dropIfExists('booking_rooms');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('role_menu');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
};
