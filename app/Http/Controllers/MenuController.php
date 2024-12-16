<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    // Menampilkan semua menu
    public function index()
    {
        // Mengambil semua menu dari database
        $menus = DB::select('SELECT * FROM menus');
        
        // Mengirim data menus ke view
        return view('menus.index', ['menus' => $menus]);
    }

    // Menampilkan detail menu berdasarkan ID
    public function show($id)
    {
        $menu = DB::select('SELECT * FROM menus WHERE id = ?', [$id]);
        
        // Mengirim data menu ke view
        return view('menus.show', ['menu' => $menu[0] ?? null]);
    }

    // Form untuk membuat menu baru
    public function create()
    {
        // Mengambil semua menu untuk ditampilkan di form (bisa juga digunakan untuk parent menu)
        $menus = DB::table('menus')->get(); 
        
        // Mengirim data menus ke view
        return view('menus.create', compact('menus'));
    }

    // Proses menyimpan menu baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:50',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        DB::insert(
            'INSERT INTO menus (name, icon, url, parent_id, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())',
            [$request->name, $request->icon, $request->url, $request->parent_id, $request->status]
        );

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    // Form untuk mengedit menu
    public function edit($id)
    {
        // Mengambil menu berdasarkan id
        $menu = DB::select('SELECT * FROM menus WHERE id = ?', [$id]);
    
        // Jika data menu ada, mengirimkannya ke view
        return view('menus.edit', ['menu' => $menu[0] ?? null]);
    }
    
    // Proses mengupdate menu
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:50',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        DB::update(
            'UPDATE menus SET name = ?, icon = ?, url = ?, parent_id = ?, status = ?, updated_at = NOW() WHERE id = ?',
            [$request->name, $request->icon, $request->url, $request->parent_id, $request->status, $id]
        );

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    // Menghapus menu
    public function destroy($id)
    {
        DB::delete('DELETE FROM menus WHERE id = ?', [$id]);
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}
