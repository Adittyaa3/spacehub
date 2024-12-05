<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckExpiredBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:check-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and update expired bookings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredBookings = DB::table('bookings')
            ->where('end_time', '<', now())
            ->where('status', 'C') // Confirmed
            ->get();

        foreach ($expiredBookings as $booking) {
            DB::table('bookings')
                ->where('id', $booking->id)
                ->update(['status' => 'F', 'updated_at' => now()]); // Finished

            // Update room status to available
            DB::table('rooms')
                ->where('id', $booking->room_id)
                ->update(['status' => 'A', 'updated_at' => now()]); // Available
        }

        $this->info('Expired bookings checked and updated.');
        Log::info('Expired bookings checked and updated.');
    }
}
