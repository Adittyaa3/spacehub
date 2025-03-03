<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room; // Tambahkan use untuk Room
use App\Models\Category; // Tambahkan use untuk Category

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1, // Ganti dengan ID pengguna dummy dari test (lihat penjelasan di bawah)
            'room_id' => Room::factory(), // Relasi dengan Room
            'price' => $this->faker->randomNumber(3),
            'start_time' => now()->addDay(),
            'end_time' => now()->addDay()->addHours(2),
            'status' => 'C', // Confirmed sebagai default
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}