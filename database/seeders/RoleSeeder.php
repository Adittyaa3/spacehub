<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan data role untuk Admin
        DB::table('roles')->insert([
            'name' => 'admin',
            'description' => 'Administrator dengan akses penuh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Menambahkan data role untuk User
        DB::table('roles')->insert([
            'name' => 'user',
            'description' => 'Pengguna biasa dengan akses terbatas',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
