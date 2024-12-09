<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = DB::table('rooms')->get();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'capacity' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facility' => 'nullable|string',
            'status' => 'required|in:A,B',
        ]);


        $minutes_in_hour = 60;
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/2/img/rooms', 'public');
        }



        DB::table('rooms')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'price' => $request->price, // Simpan harga per menit
            'image' => $imagePath,
            'facility' => $request->facility,
            'status' => $request->status,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function edit($id)
    {
        $room = DB::table('rooms')->where('id', $id)->first();
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'capacity' => 'required|integer',
            'price' => 'required|integer',
            'status' => 'required|in:A,B',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facility' => 'nullable|string',
        ]);

        $room = DB::table('rooms')->where('id', $id)->first();

        $imagePath = $room->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('assets/2/img/rooms', 'public');
        }


        $minutes_in_hour = 60;

        DB::table('rooms')->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'price' => $request->price , // Simpan harga per menit
            'status' => $request->status,
            'user_id' => Auth::id(),
            'updated_at' => now()
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('rooms')->where('id', $id)->update([
            'status' => 'D', // Set status to Deleted
            'updated_at' => now()
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
