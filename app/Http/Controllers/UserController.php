<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.name as role_name')
            ->get();

        return view('users.index', compact('users'));
    }

    // Menampilkan form untuk membuat pengguna baru
    public function create()
    {
        $roles = DB::table('roles')->get();
        return view('users.create', compact('roles'));
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone_number' => 'nullable|string|max:15',
            'institution' => 'nullable|string|max:255',
            'imageProfil' => 'nullable|string|max:255',
            'role_id' => 'nullable|exists:roles,id',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']); // Hash password

        DB::table('users')->insert($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Menampilkan form untuk mengedit pengguna
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $roles = DB::table('roles')->get();
        return view('users.edit', compact('user', 'roles'));
    }

    // Mengupdate pengguna
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',+
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'phone_number' => 'nullable|string|max:15',
            'institution' => 'nullable|string|max:255',
            'imageProfil' => 'nullable|string|max:255',
            'role_id' => 'nullable|exists:roles,id',
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']); // Hash password
        } else {
            unset($validatedData['password']); // Remove password from data if not updating
        }

        DB::table('users')->where('id', $id)->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }



public function chartData()
{
    $data = DB::table('users')
        ->select('roles.name as role', DB::raw('count(users.id) as user_count'))
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->groupBy('roles.name')
        ->get();

    return view('users.dashboardAdmin', compact('data'));
}

}

