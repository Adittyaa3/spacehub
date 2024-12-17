<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;

class UpdateRoomStatus extends Command
{
    protected $signature = 'room:update-status';
    protected $description = 'Update room status based on current bookings';

    public function handle()
    {
        $now = Carbon::now();

        // Update rooms that should be marked as booked
        Booking::where('status', 'C')
            ->where('start_time', '<=', $now)
            ->where('end_time', '>', $now)
            ->each(function ($booking) {
                Room::where('id', $booking->room_id)->update(['status' => 'B']);
            });

        // Update rooms that should be marked as available
        Booking::where('status', 'C')
            ->where('end_time', '<=', $now)
            ->each(function ($booking) {
                Room::where('id', $booking->room_id)->update(['status' => 'A']);
            });

        $this->info('Room statuses updated successfully.');
    }
}
