<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm(){
        return view('auth.login');
    }

    public function showregisterForm(){
        return view('auth.register');
    }




    public function register(Request $request)
    {
        // Validasi inputan
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',  // Pastikan ada konfirmasi password
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Proses registrasi user baru
        $user = DB::table('users')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
            'role_id' => 1, // Default role untuk user adalah 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Mendapatkan data user yang baru dibuat
        $user = DB::table('users')->where('id', $user)->first();

        // Jika registrasi berhasil, arahkan ke halaman login
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function login(Request $request){
    // Validasi inputan
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Mencari user berdasarkan email
    $user = DB::table('users')->where('email', $request->email)->first();

    // Mengecek apakah user ditemukan dan password valid
    if ($user && Hash::check($request->password, $user->password)) {
        // Autentikasi berhasil, membuat session atau token
        Auth::loginUsingId($user->id);

        // Cek role user
        if ($user->role_id == 1) {
            return redirect()->route('user.dashboard'); // Dashboard user
        } elseif ($user->role_id == 2) {
            return redirect()->route('admin.dashboard'); // Dashboard admin
        }
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session to clear the session data
        $request->session()->invalidate();

        // Regenerate the session to avoid session fixation attacks
        $request->session()->regenerateToken();

        // Redirect the user to the homepage (or any page you prefer)
        return redirect('/');
    }
}
