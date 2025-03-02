<?php 
namespace Database\Seeders; use Illuminate\Database\Seeder; use Illuminate\Support\Facades\DB; class ListMenuSeeder
    extends Seeder { /** * Run the database seeds. * * @return void */ public function run() { $menus=[ ['name'=>
    'Dashboard', 'url' => '/dashboard', 'icon' => 'ni ni-tv-2', 'status' => 1],
    ['name' => 'Role', 'url' => '/roles', 'icon' => 'ni ni-key-25', 'status' => 1],
    ['name' => 'Menu', 'url' => '/menus', 'icon' => 'ni ni-bullet-list-67', 'status' => 1],
    ['name' => 'User', 'url' => '/users', 'icon' => 'ni ni-single-02', 'status' => 1],
    ['name' => 'Category rooms', 'url' => '/categories', 'icon' => 'ni ni-building', 'status' => 1],
    ['name' => 'Room', 'url' => '/rooms', 'icon' => 'ni ni-square-pin', 'status' => 1],
    ['name' => 'Booking', 'url' => '/bookings', 'icon' => 'ni ni-calendar-grid-58', 'status' => 1],
    ['name' => 'History', 'url' => '/history', 'icon' => 'ni ni-time-alarm', 'status' => 1],
    ['name' => 'Setting menu', 'url' => '/settings', 'icon' => 'ni ni-settings', 'status' => 1],
    ];

    DB::table('menus')->insert($menus);
    }
    }