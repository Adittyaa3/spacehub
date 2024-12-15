<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Meeting Room',
                'description' => 'Rooms for business meetings and presentations'
            ],
            [
                'name' => 'Conference Hall',
                'description' => 'Large spaces for conferences and events'
            ],
            [
                'name' => 'Training Room',
                'description' => 'Equipped rooms for training sessions'
            ],
            [
                'name' => 'Studio',
                'description' => 'Creative spaces for multimedia activities'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
