<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleMenuSeeder extends Seeder
{
    public function run()
    {
        // Data role dan menu yang akan dihubungkan
        $roles = [
            'admin' => [
                'Dashboard',
                'Role',
                'Menu',
                'User',
                'Category rooms',
                'Room',
                'Booking',
                'Cart',
                'History',
                'Setting menu'
            ],
            'user' => [
                'Category rooms',
                'Room',
                'Booking',
                'Cart',
                'History'
            ],
        ];

        // Menyisipkan role dan menu ke dalam tabel role_menu
        foreach ($roles as $roleName => $menuNames) {
            // Dapatkan id role berdasarkan nama role
            $roleId = DB::table('roles')->where('name', $roleName)->value('id');

            // Dapatkan id menu berdasarkan nama menu
            $menuIds = DB::table('menus')
                ->whereIn('name', $menuNames)
                ->pluck('id');

            // Menghubungkan role dengan menu
            foreach ($menuIds as $menuId) {
                DB::table('role_menu')->insert([
                    'role_id' => $roleId,
                    'menu_id' => $menuId
                ]);
            }
        }
    }
}
