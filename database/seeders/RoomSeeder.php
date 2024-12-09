<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'name' => 'student room',
                'description' => 'for your groub',
                'capacity' => 10,
                'price' => 10000,
                'status' => 'A', // Available
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'space self',
                'description' => ' your own',
                'capacity' => 1,
                'price' => 5000,
                'status' => 'A', // Available
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'smoking room',
                'description' => 'just you and your friends',
                'capacity' => 30,
                'price' => 150000,
                'status' => 'A', // Available
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
