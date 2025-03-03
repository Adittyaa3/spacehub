<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Room;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RoomTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed roles dengan query builder
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'User', 'description' => 'pengguna default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Admin', 'description' => 'administrator', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seed users dengan query builder dan simpan ID
        $userId = DB::table('users')->insertGetId([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role_id' => 1, // Asumsi peran default adalah 'User'
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed categories dengan model Eloquent
        $category = Category::firstOrCreate([
            'name' => 'Standard Room',
            'description' => 'Kategori kamar standar',
            'image' => 'standard.jpg',
            'facility' => 'Wi-Fi, TV',
        ]);

        // Seed data kamar dengan model Eloquent dan gunakan userId yang benar
        Room::create([
            'name' => 'Room 101',
            'description' => 'Kamar standar yang nyaman',
            'capacity' => 2,
            'price' => 100000,
            'image' => 'room101.jpg',
            'facility' => 'Wi-Fi, TV',
            'status' => 'A', // Tersedia
            'user_id' => $userId, // Menggunakan user_id yang benar
            'category_id' => $category->id,
        ]);
    }

    /** Test untuk membuat kamar */
    public function test_create_room()
    {
        // Mengambil kategori yang ada
        $category = Category::first();
        $user = User::first(); // Pastikan kita menggunakan user yang benar

        $roomData = [
            'name' => 'Room 102',
            'description' => 'Kamar deluxe yang luas',
            'capacity' => 4,
            'price' => 200000,
            'image' => 'room102.jpg',
            'facility' => 'Wi-Fi, TV, Minibar',
            'status' => 'A', // Tersedia
            'user_id' => $user->id, // Gunakan user yang sudah ada
            'category_id' => $category->id, // Menggunakan kategori yang sudah dibuat
        ];

        // Membuat kamar baru menggunakan model Room
        Room::create($roomData);

        // Mengambil kamar yang baru dibuat
        $room = Room::where('name', 'Room 102')->first();

        // Asersi
        $this->assertNotNull($room);
        $this->assertEquals('Room 102', $room->name);
        $this->assertEquals('Kamar deluxe yang luas', $room->description);
        $this->assertEquals(4, $room->capacity);
        $this->assertEquals(200000, $room->price);
        $this->assertEquals('room102.jpg', $room->image);
        $this->assertEquals('Wi-Fi, TV, Minibar', $room->facility);
        $this->assertEquals('A', $room->status);
        $this->assertEquals($user->id, $room->user_id); // Pastikan user_id sesuai dengan yang digunakan
        $this->assertEquals($category->id, $room->category_id); // Pastikan category_id sesuai dengan yang digunakan
    }

    /** Test untuk membaca kamar */
    public function test_read_room()
    {
        // Mengambil kamar yang telah disemai (Room 101)
        $room = Room::where('name', 'Room 101')->first();

        // Asersi untuk memastikan ID yang benar
        $this->assertNotNull($room);
        $this->assertEquals('Room 101', $room->name);
        $this->assertEquals('Kamar standar yang nyaman', $room->description);
        $this->assertEquals(2, $room->capacity);
        $this->assertEquals(100000, $room->price);
        $this->assertEquals('room101.jpg', $room->image);
        $this->assertEquals('Wi-Fi, TV', $room->facility);
        $this->assertEquals('A', $room->status);
        
        // Pastikan user_id sesuai dengan yang telah disisipkan
        $user = User::find($room->user_id);
        $this->assertNotNull($user);
        $this->assertEquals('Admin', $user->name);

        // Pastikan category_id sesuai dengan yang telah disisipkan
        $category = Category::find($room->category_id);
        $this->assertNotNull($category);
        $this->assertEquals('Standard Room', $category->name);
    }

    /** Test untuk memperbarui kamar */
    public function test_update_room()
    {
        $updatedData = [
            'description' => 'Kamar standar yang nyaman diperbarui',
            'price' => 120000,
            'facility' => 'Wi-Fi, TV, Coffee Maker',
            'status' => 'B', // Dipesan
        ];

        // Mengambil kamar yang akan diperbarui
        $room = Room::where('name', 'Room 101')->first();
        $room->update($updatedData);

        // Mengambil kamar yang sudah diperbarui
        $updatedRoom = Room::where('name', 'Room 101')->first();

        // Asersi
        $this->assertNotNull($updatedRoom);
        $this->assertEquals('Room 101', $updatedRoom->name);
        $this->assertEquals('Kamar standar yang nyaman diperbarui', $updatedRoom->description);
        $this->assertEquals(120000, $updatedRoom->price);
        $this->assertEquals('Wi-Fi, TV, Coffee Maker', $updatedRoom->facility);
        $this->assertEquals('B', $updatedRoom->status);
    }

    /** Test untuk menghapus kamar */
    public function test_delete_room()
    {
        // Menghapus kamar menggunakan model
        $room = Room::where('name', 'Room 101')->first();
        $room->delete();

        // Mencoba mengambil kamar yang sudah dihapus
        $room = Room::where('name', 'Room 101')->first();

        // Asersi
        $this->assertNull($room); // Kamar seharusnya sudah tidak ada
    }

    /** Membersihkan lingkungan uji */
    protected function tearDown(): void
    {
        parent::tearDown();
    }
}