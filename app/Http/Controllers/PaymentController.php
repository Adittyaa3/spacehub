<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;

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
        // Log raw request
        Log::info('Raw Request:', [
            'content' => $request->getContent(),
            'all' => $request->all()
        ]);

        try {
            $notification = json_decode($request->getContent(), true);

            // Log decoded notification
            Log::info('Decoded Notification:', [
                'notification' => $notification,
                'type' => gettype($notification)
            ]);

            // Extract and validate required fields
            $order_id = $notification['order_id'] ?? null;
            $transaction_status = $notification['transaction_status'] ?? null;
            $payment_type = $notification['payment_type'] ?? null;
            $transaction_id = $notification['transaction_id'] ?? null;
            $gross_amount = $notification['gross_amount'] ?? null;

            // Log extracted data
            Log::info('Extracted Data:', [
                'order_id' => $order_id . ' (' . gettype($order_id) . ')',
                'transaction_status' => $transaction_status . ' (' . gettype($transaction_status) . ')',
                'payment_type' => $payment_type . ' (' . gettype($payment_type) . ')',
                'transaction_id' => $transaction_id . ' (' . gettype($transaction_id) . ')',
                'gross_amount' => $gross_amount . ' (' . gettype($gross_amount) . ')'
            ]);

            if ($transaction_status == 'capture' || $transaction_status == 'settlement') {
                $booking = DB::table('bookings')
                    ->where('id', $order_id)
                    ->first();

                // Log booking data
                Log::info('Booking Data:', [
                    'booking' => $booking,
                    'found' => !is_null($booking)
                ]);

                if ($booking) {
                    try {
                        // Log before insert payment
                        Log::info('Attempting payment insert');

                        DB::table('payments')->insert([
                            'booking_id' => $booking->id,
                            'transaction_id' => $transaction_id,
                            'payment_type' => $payment_type,
                            'amount' => $gross_amount,
                            'status' => 'paid',
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);

                        Log::info('Payment inserted successfully');

                        // Update booking status
                        DB::table('bookings')
                            ->where('id', $booking->id)
                            ->update([
                                'status' => 'C',
                                'updated_at' => now()
                            ]);

                        Log::info('Booking status updated');

                        // Insert cart
                        DB::table('carts')->insert([
                            'user_id' => $booking->user_id,
                            'room_id' => $booking->room_id,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);

                        Log::info('Cart entry added');

                    } catch (\Exception $e) {
                        Log::error('Database Error: ' . $e->getMessage(), [
                            'exception' => $e,
                            'trace' => $e->getTraceAsString()
                        ]);
                    }
                }
            }

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {
            Log::error('Callback Error: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['status' => 'error']);
        }
    }
}
