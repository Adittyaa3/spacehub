<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan user dengan role_id = 1 (user biasa)
        DB::table('users')->insert([
            'name' => 'adit',
            'email' => 'adit@gmail.com',
            'password' => Hash::make('12345678'),  // Pastikan menggunakan hash untuk password
            'role_id' => 1,  // Menggunakan role_id = 1 untuk user biasa
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('12345678'),  // Pastikan menggunakan hash untuk password
        'role_id' => 2,  // Menggunakan role_id = 1 untuk user biasa
        'created_at' => now(),
        'updated_at' => now(),
    ]);


        // Anda bisa menambahkan lebih banyak user dengan role_id yang berbeda jika diperlukan
        // DB::table('users')->insert([...]);
    }
}
