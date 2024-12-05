<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->select('bookings.*', 'rooms.name as room_name', 'users.name as user_name')
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

        // Membulatkan waktu ke jam terdekat
        $start_time = Carbon::parse($request->start_time)->minute(0)->second(0);
        $end_time = Carbon::parse($request->end_time)->minute(0)->second(0);

        // Validasi jika waktu mulai lebih besar dari waktu selesai
        if ($start_time >= $end_time) {
            return back()->withErrors(['error' => 'End time must be greater than start time.']);
        }

        // Hitung durasi dalam jam
        $duration = $start_time->diffInHours($end_time);

        // Debugging: Log untuk memastikan durasi dan harga per jam benar
        Log::info('Duration: ' . $duration);
        Log::info('Room Price per Hour: ' . $room->price);

        // Hitung total harga berdasarkan durasi
        $price = $room->price * $duration;


        // Debugging: Lihat hasil perhitungan
        Log::info('Booking price calculated: ' . $price);

        // Validasi harga
        if ($price <= 0) {
            Log::error('Invalid booking price: ' . $price);
            return back()->withErrors(['error' => 'Invalid booking price.']);
        }

        $bookingId = DB::table('bookings')->insertGetId([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'price' => $price,
            'status' => 'P', // Pending
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // DB::table('rooms')->where('id', $request->room_id)->update([
        //     'status' => 'B', // Booked
        //     'updated_at' => now()
        // ]);

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

        // Membulatkan waktu ke jam terdekat
        $start_time = Carbon::parse($request->start_time)->minute(0)->second(0);
        $end_time = Carbon::parse($request->end_time)->minute(0)->second(0);

        // Validasi jika waktu mulai lebih besar dari waktu selesai
        if ($start_time >= $end_time) {
            return back()->withErrors(['error' => 'End time must be greater than start time.']);
        }

        // Hitung durasi dalam jam
        $duration = $end_time->diffInHours($start_time);

        // Debugging: Log untuk memastikan durasi dan harga per jam benar
        Log::info('Duration: ' . $duration);
        Log::info('Room Price per Hour: ' . $room->price);

        // Hitung total harga berdasarkan durasi
        $price = $room->price * $duration;

        // Debugging: Lihat hasil perhitungan
        Log::info('Booking price calculated: ' . $price);

        // Validasi harga
        if ($price <= 0) {
            Log::error('Invalid booking price: ' . $price);
            return back()->withErrors(['error' => 'Invalid booking price.']);
        }

        DB::table('bookings')->where('id', $id)->update([
            'room_id' => $request->room_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'price' => $price,
            'updated_at' => now()
        ]);

        return redirect()->route('bookings.index');
    }

    public function destroy($id)
    {
        DB::table('bookings')->where('id', $id)->delete();
        return redirect()->route('bookings.index');
    }

    public function checkExpiredBookings()
    {
        $now = Carbon::now();

        $expiredBookings = DB::table('bookings')
            ->where('end_time', '<', $now)
            ->where('status', 'C') // Confirmed
            ->get();

        foreach ($expiredBookings as $booking) {
            DB::table('bookings')
                ->where('id', $booking->id)
                ->update(['status' => 'F', 'updated_at' => now()]); // Finished

            DB::table('rooms')
                ->where('id', $booking->room_id)
                ->update(['status' => 'A', 'updated_at' => now()]); // Available
        }
    }
}
