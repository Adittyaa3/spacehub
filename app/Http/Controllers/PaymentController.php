<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class PaymentController extends Controller
{
    public function create($booking_id)
    {
        $booking = DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->where('bookings.id', $booking_id)
            ->select('bookings.*', 'rooms.name as room_name', 'rooms.price as room_price')
            ->first();

        return view('payments.create', compact('booking'));
    }

    public function store(Request $request)
    {
        // Set your Merchant Server Key
        Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        Config::$isSanitized = config('midtrans.is_sanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('midtrans.is_3ds');

        $booking = DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->where('bookings.id', $request->booking_id)
            ->select('bookings.*', 'rooms.name as room_name', 'rooms.price as room_price')
            ->first();

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $booking->room_price,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'item_details' => [
                [
                    'id' => $booking->room_id,
                    'price' => $booking->room_price,
                    'quantity' => 1,
                    'name' => $booking->room_name,
                ],
            ],
            'enabled_payments' => [
                'credit_card', 'bank_transfer', 'echannel', 'alfamart', 'indomaret', 'gopay', 'shopeepay'
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            return view('payments.pay', compact('snapToken', 'booking'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function callback(Request $request)
{
    try {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production', false);

        $notification = new Notification();

        $order_id = $notification->order_id;
        $transaction_status = $notification->transaction_status;
        $payment_type = $notification->payment_type;

        $payment = DB::table('payments')
            ->where('transaction_id', $order_id)
            ->first();

        if ($payment) {
            DB::table('payments')
                ->where('transaction_id', $order_id)
                ->update([
                    'payment_type' => $payment_type,
                    'status' => $transaction_status,
                    'updated_at' => now()
                ]);

            if ($transaction_status == 'settlement') {
                DB::table('bookings')
                    ->where('id', $payment->booking_id)
                    ->update([
                        'status' => 'C', // Confirmed
                        'updated_at' => now()
                    ]);

                // We no longer update the room status here
            }
        } else {
            Log::error('No payment found for order_id: ' . $order_id);
        }

        return response()->json(['status' => 'success']);
    } catch (\Exception $e) {
        Log::error('Midtrans Callback Error: ' . $e->getMessage());
        return response()->json(['status' => 'error'], 500);
    }
    
}
    }

