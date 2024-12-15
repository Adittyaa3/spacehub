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
                'image' => null,
                'facility' => 'Wifi, Projector, Whiteboard',
                'status' => 'A', // Available
                'user_id' => 1, // Assuming admin user has ID 1
                'category_id' => 1, // Meeting Room category
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'space self',
                'description' => 'your own',
                'capacity' => 1,
                'price' => 5000,
                'image' => null,
                'facility' => 'Wifi, Desk, Chair',
                'status' => 'A', // Available
                'user_id' => 1,
                'category_id' => 3, // Training Room category
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'smoking room',
                'description' => 'just you and your friends',
                'capacity' => 30,
                'price' => 150000,
                'image' => null,
                'facility' => 'Wifi, Air Conditioner, Smoking Area',
                'status' => 'A', // Available
                'user_id' => 1,
                'category_id' => 2, // Conference Hall category
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
