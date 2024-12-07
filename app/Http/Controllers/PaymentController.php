<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;
use Illuminate\Support\Facades\Auth;
use Midtrans\Notification;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Midtrans Configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('false');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

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
        try {
            $booking = DB::table('bookings')
                ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
                ->where('bookings.id', $request->booking_id)
                ->select('bookings.*', 'rooms.name as room_name', 'rooms.price as room_price', 'bookings.price as booking_price')
                ->first();

            if ($booking->booking_price <= 0) {
                return back()->withErrors(['error' => 'Invalid booking price.']);
            }

            $order_id = 'ORDER-' . uniqid();

            $params = [
                'transaction_details' => [
                    'order_id' => $order_id,
                    'gross_amount' => $booking->booking_price, // Ambil langsung dari tabel bookings
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ],
                'item_details' => [
                    [
                        'id' => $booking->room_id,
                        'price' => $booking->booking_price, // Ambil langsung dari tabel bookings
                        'quantity' => 1,
                        'name' => $booking->room_name,
                    ],
                ],
                'enabled_payments' => [
                    'credit_card', 'bank_transfer',
                    'echannel', 'alfamart', 'indomaret',
                    'gopay', 'shopeepay'
                ],
            ];

            // Debugging: Log params
            Log::info('Midtrans Params: ', $params);

            $snapToken = Snap::getSnapToken($params);

            // Save payment in pending status
            DB::table('payments')->insert([
                'booking_id' => $booking->id,
                'transaction_id' => $order_id,
                'payment_type' => 'pending',
                'amount' => $booking->booking_price, // Ambil langsung dari tabel bookings
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return view('payments.pay', compact('snapToken', 'booking', 'order_id'));

        } catch (\Exception $e) {
            Log::error('Payment Creation Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Payment could not be processed. Please try again.']);
        }
    }

        public function callback(Request $request)
        {
            try {
                // Inisialisasi konfigurasi Midtrans
                Config::$serverKey = config('midtrans.server_key');
                Config::$isProduction = config('midtrans.is_production', false);

                // Buat objek notifikasi Midtrans
                $notification = new Notification();

                // Dapatkan data pembayaran dari Midtrans
                $order_id = $notification->order_id;
                $transaction_status = $notification->transaction_status;
                $payment_type = $notification->payment_type;
                $fraud_status = $notification->fraud_status;

                // Cari data pembayaran di database
                $payment = DB::table('payments')
                    ->where('transaction_id', $order_id)
                    ->first();

                if ($payment) {
                    // Perbarui status pembayaran
                    DB::table('payments')
                        ->where('transaction_id', $order_id)
                        ->update([
                            'payment_type' => $payment_type,
                            'status' => $transaction_status,
                            'updated_at' => now()
                        ]);

                    // Perbarui status pemesanan jika pembayaran berhasil
                    if ($payment_type == $notification->payment_type && $transaction_status == 'settlement') {
                        DB::table('bookings')
                            ->where('id', $payment->booking_id)
                            ->update([
                                'status' => 'C', // Confirmed
                                'updated_at' => now()
                            ]);

                        // Perbarui status kamar
                        DB::table('rooms')
                            ->where('id', DB::table('bookings')->where('id', $payment->booking_id)->value('room_id'))
                            ->update([
                                'status' => 'B', // Booked
                                'updated_at' => now()
                            ]);

                          

                    }
                } else {
                    Log::error('No payment found for order_id: ' . $order_id);
                }

                // Kembalikan respons sukses ke Midtrans
                return response()->json(['status' => 'success']);
            } catch (\Exception $e) {
                Log::error('Midtrans Callback Error: ' . $e->getMessage());
                return response()->json(['status' => 'error'], 500);
            }
        }


    public function finishPayment(Request $request)
    {
        // Handle successful payment redirection
        return redirect()->route('bookings.index')
            ->with('success', 'Payment successful!');
    }

    public function unfinishPayment(Request $request)
    {
        // Handle unfinished payment
        return redirect()->route('bookings.index')
            ->with('warning', 'Payment was not completed.');
    }

    public function errorPayment(Request $request)
    {
        // Handle payment error
        return redirect()->route('bookings.index')
            ->with('error', 'Payment failed.');
    }
}
