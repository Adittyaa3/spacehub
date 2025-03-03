<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category; // Impor model Category untuk relasi

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(), // Nama ruangan acak, misalnya "MeetingRoom", "ConferenceRoom"
            'category_id' => Category::factory(), // Relasi dengan Category, gunakan factory Category
            'price' => $this->faker->randomFloat(2, 50, 500), // Harga acak antara 50 dan 500 (dengan 2 desimal)
            'capacity' => $this->faker->numberBetween(1, 100), // Kapasitas acak antara 1 dan 100
            'status' => 'A', // Status default "A" untuk room yang tersedia, sesuai dengan controller
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}