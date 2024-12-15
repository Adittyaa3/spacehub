<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }
    public function create()
{
    $categories = Category::all();
    return view('rooms.create', compact('categories'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'capacity' => 'required|integer',
            'price' => 'required|integer',
            'status' => 'required|in:A,B',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facility' => 'nullable|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('assets/2/img/rooms', 'public');
                $minutes_in_hour = 60;
        }

        $validated['user_id'] = Auth::id();

        Room::create($validated);

        return redirect()->route('rooms.index')
            ->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        $categories = Category::all();
        return view('rooms.edit', compact('room', 'categories'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'capacity' => 'required|integer',
            'price' => 'required|integer',
            'status' => 'required|in:A,B',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facility' => 'nullable|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            if ($room->image) {
                Storage::disk('public')->delete($room->image);
            }
            $validated['image'] = $request->file('image')
                ->store('assets/2/img/rooms', 'public');
        }

        $room->update($validated);

        return redirect()->route('rooms.index')
            ->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        if ($room->image) {
            Storage::disk('public')->delete($room->image);
        }

        $room->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Room deleted successfully.');
    }
}
