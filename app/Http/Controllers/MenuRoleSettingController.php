<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MenuRoleSettingController extends Controller
{
    // Menampilkan halaman pengaturan menu per role
    public function index()
    {
        // Mengambil semua role dan menu
        $roles = DB::table('roles')->get();
        $menus = DB::table('menus')->get(); // Pastikan menus diambil dari database

        // Mendapatkan hubungan role-menu
        $roleMenus = [];
        foreach ($roles as $role) {
            $roleMenus[$role->id] = DB::table('role_menu')
                ->where('role_id', $role->id)
                ->pluck('menu_id')
                ->toArray();
        }

        // Mengirim data ke view
        return view('settings.index', compact('roles', 'menus', 'roleMenus')); 
    }

    // Mengupdate pengaturan menu per role
    public function update(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'menu_ids' => 'required|array',
            'menu_ids.*' => 'exists:menus,id', // Validasi setiap menu_id ada dalam tabel menus
        ]);

        $roleId = $validated['role_id'];
        $menuIds = $validated['menu_ids'];

        DB::beginTransaction();
        try {
            // Hapus role-menu lama
            DB::table('role_menu')->where('role_id', $roleId)->delete();

            // Persiapkan data untuk disisipkan
            $data = [];
            foreach ($menuIds as $menuId) {
                $data[] = ['role_id' => $roleId, 'menu_id' => $menuId];
            }

            // Sisipkan data baru
            DB::table('role_menu')->insert($data);
            DB::commit();

            return redirect()->route('settings.index')->with('success', 'Menu berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('settings.index')->with('error', 'Gagal memperbarui menu');
        }
    }
}
