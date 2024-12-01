<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->select('bookings.*', 'rooms.name as room_name', 'rooms.price as room_price', 'users.name as user_name')
            ->where('bookings.status', '!=', 'D')
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = DB::table('rooms')->where('status', 'A')->get();
        return view('bookings.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $room = DB::table('rooms')->where('id', $request->room_id)->first();

        if ($room->status == 'B') {
            return back()->withErrors(['error' => 'Room is already booked.']);
        }

        $bookingId = DB::table('bookings')->insertGetId([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'P', // Pending
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('rooms')->where('id', $request->room_id)->update([
            'status' => 'B', // Booked
            'updated_at' => now()
        ]);

        return redirect()->route('payments.create', ['booking_id' => $bookingId]);
    }

    public function edit($id)
    {
        $booking = DB::table('bookings')->where('id', $id)->first();
        $rooms = DB::table('rooms')->where('status', 'A')->get();
        return view('bookings.edit', compact('booking', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $room = DB::table('rooms')->where('id', $request->room_id)->first();

        if ($room->status == 'B') {
            return back()->withErrors(['error' => 'Room is already booked.']);
        }

        DB::table('bookings')->where('id', $id)->update([
            'room_id' => $request->room_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => $request->status,
            'updated_at' => now()
        ]);

        return redirect()->route('bookings.index');
    }

    public function destroy($id)
    {
        DB::table('bookings')->where('id', $id)->update([
            'status' => 'D', // Set status to Deleted
            'updated_at' => now()
        ]);

        return redirect()->route('bookings.index');
    }
}
