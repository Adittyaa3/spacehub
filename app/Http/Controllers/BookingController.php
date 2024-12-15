<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Category;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class BookingController extends Controller
{
    // public function index(): View
    // {
    //     $bookings = Booking::with(['room', 'user'])->get();
    //     return view('bookings.index', compact('bookings'));
    // }
    public function index()
    {
        $bookings = Booking::with(['room', 'user'])
            ->where('user_id', Auth::id())
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    public function showRooms(Request $request): View
    {
        $categories = Category::with('rooms')->get();
        $roomsQuery = Room::with('category')
            ->where('status', 'A'); // Room yang tersedia

        if ($request->has('category_id') && $request->category_id != '') {
            $roomsQuery->where('category_id', $request->category_id);
        }

        $rooms = $roomsQuery->get();

        return view('bookings.showRooms', compact('rooms', 'categories'));
    }



public function create(Request $request)
{
    $categoryId = $request->input('category_id');
    $rooms = Room::where('category_id', $categoryId)->where('status', 'A')->get();
    return view('bookings.create', compact('rooms'));
}


public function storeBooking(Request $request)
{
    $request->validate([
        'room_id' => 'required|exists:rooms,id',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'price' => 'required|numeric',
    ]);

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

    $bookingId = DB::table('bookings')->insertGetId([
        'user_id' => Auth::id(),
        'room_id' => $request->room_id,
        'price' => $price,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'status' => 'P', // Pending
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // DB::table('rooms')->where('id', $request->room_id)->update([
    //     'status' => 'B', // Booked
    //     'updated_at' => now(),
    // ]);

    return redirect()->route('payments.create', ['booking_id' => $bookingId]);
}

    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->update(['status' => 'D']); // Soft delete
        return redirect()->route('bookings.index')
            ->with('success', 'Booking cancelled successfully.');
    }

    public function transactionHistory()
    {
        $userId = Auth::id();
        $transactions = DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->join('payments', 'bookings.id', '=', 'payments.booking_id')
            ->where('bookings.user_id', $userId)
            ->whereIn('payments.status', ['settlement']) // Filter transaksi yang berhasil
            ->select(
                'bookings.*',
                'rooms.name as room_name',
                DB::raw('MAX(payments.payment_type) as payment_type'),
                DB::raw('MAX(payments.amount) as amount'),
                DB::raw('MAX(payments.status) as payment_status')
            )
            ->groupBy('bookings.id', 'rooms.name', 'bookings.user_id', 'bookings.room_id', 'bookings.price', 'bookings.start_time', 'bookings.end_time', 'bookings.status', 'bookings.created_at', 'bookings.updated_at')
            ->get();

        return view('transactions.history', compact('transactions'));
    }



}
