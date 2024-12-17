<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MenuRoleSettingController extends Controller
{
    // Menampilkan halaman pengaturan menu per role
    // Controller
// Controller method untuk menampilkan data role dan menu
public function showSettings()
{
    // Get all roles
    $roles = DB::table('roles')->get();

    // Get all menus
    $menus = DB::table('menus')->get();

    // Get the selected menus for each role from the role_menu table
    $roleMenus = DB::table('role_menu')
        ->select('role_id', 'menu_id')
        ->get()
        ->groupBy('role_id'); // Group by role_id

    return view('settings.index', compact('roles', 'menus', 'roleMenus'));
}



    // Mengupdate pengaturan menu per role
    // Controller
// Controller method untuk menyimpan update
public function updateSettings(Request $request)
{
    // Clear existing role-menu relations
    DB::table('role_menu')->delete();

    // Insert the new role-menu relations based on the submitted form data
    if ($request->has('role_menu')) {
        foreach ($request->role_menu as $role_id => $menu_ids) {
            foreach ($menu_ids as $menu_id) {
                DB::table('role_menu')->insert([
                    'role_id' => $role_id,
                    'menu_id' => $menu_id,
                ]);
            }
        }
    }

    return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil disimpan');
}

}
