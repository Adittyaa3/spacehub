<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = DB::table('carts')
            ->join('rooms', 'carts.room_id', '=', 'rooms.id')
            ->where('carts.user_id', Auth::id())
            ->select('carts.*', 'rooms.name', 'rooms.description', 'rooms.capacity')
            ->get();

        return view('carts.index', compact('cartItems'));
    }

    public function addToCart($roomId)
    {
        DB::table('carts')->insert([
            'user_id' => Auth::id(),
            'room_id' => $roomId,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('carts.index');
    }

    public function removeFromCart($cartId)
    {
        DB::table('carts')->where('id', $cartId)->delete();
        return redirect()->route('carts.index');
    }

    public function checkout()
    {
        $cartItems = DB::table('carts')
            ->where('user_id', Auth::id())
            ->get();

        foreach ($cartItems as $item) {
            $bookingId = DB::table('bookings')->insertGetId([
                'name' => 'Booking for Room ' . $item->room_id,
                'description' => 'Booking description',
                'capacity' => 1, // Adjust as needed
                'status' => 'B', // Booked
                'user_id' => Auth::id(),
                'room_id' => $item->room_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Simulate payment process
            DB::table('payments')->insert([
                'booking_id' => $bookingId,
                'transaction_id' => uniqid(),
                'payment_type' => 'credit_card', // Adjust as needed
                'amount' => 100.00, // Adjust as needed
                'status' => 'paid', // Adjust as needed
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Clear the cart
        DB::table('carts')->where('user_id', Auth::id())->delete();

        return redirect()->route('bookings.index');
    }
}
