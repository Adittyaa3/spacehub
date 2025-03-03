<?php

namespace Tests\Unit\ByController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\Room;
use App\Models\Category;
use App\Models\Booking;
use PHPUnit\Framework\Attributes\Test;



class BookingTest extends TestCase
{
    use RefreshDatabase;

    protected $userId;
    protected $user;


    protected function setUp(): void
    {
        parent::setUp();
        // Membuat pengguna dummy menggunakan query builder (karena User tidak pakai model)
        $this->userId = DB::table('users')->insertGetId([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // atau gunakan Hash::make('password')
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Simulasikan pengguna yang login menggunakan userId
        $this->actingAsUser($this->userId);

        $this->user = (object) ['id' => $this->userId];
    }

    // Helper method untuk mensimulasikan autentikasi tanpa model User
    private function actingAsUser($userId)
    {
        Auth::shouldReceive('id')->andReturn($userId);
        Auth::shouldReceive('check')->andReturn(true);
        Auth::shouldReceive('user')->andReturn((object) ['id' => $userId]);
    }

    #[Test]
    public function it_shows_user_bookings_index_page()
    {
        // Arrange: Membuat data dummy untuk room dan booking menggunakan model (Room dan Booking pakai model)
        $room = Room::factory()->create(['status' => 'A']); // Room pakai factory
        Booking::factory()->create([
            'user_id' => $this->userId, // Gunakan userId dari query builder
            'room_id' => $room->id,
            'status' => 'C', // Confirmed
            'start_time' => now()->addDay(),
            'end_time' => now()->addDay()->addHours(2),
            'price' => 100,
        ]);

        // Act: Mengakses route index
        $response = $this->get(route('bookings.index'));

        // Assert: Memeriksa hasil
        $response->assertStatus(200)
                 ->assertViewIs('bookings.index')
                 ->assertViewHas('bookings', function ($bookings) {
                     return $bookings->count() === 1 && $bookings->first()->user_id === $this->userId;
                 });
    }

    #[Test]
    public function it_shows_available_rooms_page()
    {
        // Arrange: Membuat data dummy untuk category dan room menggunakan model
        $category = Category::factory()->create();
        $room = Room::factory()->create([
            'category_id' => $category->id,
            'status' => 'A', // Room yang tersedia
        ]);

        // Act: Mengakses route untuk menampilkan rooms
        $response = $this->get(route('bookings.showRooms'));

        // Assert: Memeriksa hasil
        $response->assertStatus(200)
                 ->assertViewIs('bookings.showRooms')
                 ->assertViewHas('rooms', function ($rooms) use ($room) {
                     return $rooms->contains($room);
                 })
                 ->assertViewHas('categories');
    }

    #[Test]
    public function it_shows_available_rooms_by_category()
    {
        // Arrange: Membuat data dummy untuk category dan room menggunakan model
        $category = Category::factory()->create();
        $room = Room::factory()->create([
            'category_id' => $category->id,
            'status' => 'A', // Room yang tersedia
        ]);

        // Act: Mengakses route dengan filter category
        $response = $this->get(route('bookings.showRooms', ['category_id' => $category->id]));

        // Assert: Memeriksa hasil
        $response->assertStatus(200)
                 ->assertViewIs('bookings.showRooms')
                 ->assertViewHas('rooms', function ($rooms) use ($room) {
                     return $rooms->count() === 1 && $rooms->first()->id === $room->id;
                 })
                 ->assertViewHas('categories');
    }

    #[Test]
    public function it_shows_booking_create_page()
    {
        // Arrange: Membuat data dummy untuk category dan room menggunakan model
        $category = Category::factory()->create();
        $room = Room::factory()->create([
            'category_id' => $category->id,
            'status' => 'A', // Room yang tersedia
        ]);

        // Buat data booked rooms dummy (opsional, tergantung kebutuhan)
        Booking::factory()->create([
            'user_id' => $this->userId, // Gunakan userId dari query builder
            'room_id' => $room->id,
            'status' => 'C', // Confirmed
            'start_time' => now()->subDay(),
            'end_time' => now()->subDay()->addHours(2),
            'price' => 100,
        ]);

        // Act: Mengakses route untuk membuat booking
        $response = $this->get(route('bookings.create', ['category_id' => $category->id]));

        // Assert: Memeriksa hasil
        $response->assertStatus(200)
                 ->assertViewIs('bookings.create')
                 ->assertViewHas('rooms', function ($rooms) use ($room) {
                     return $rooms->contains($room);
                 })
                 ->assertViewHas('bookedRooms');
    }

    #[Test]
    public function it_stores_new_booking_and_redirects_to_payment()
    {
        // Arrange: Membuat data dummy untuk room menggunakan model
        $room = Room::factory()->create(['status' => 'A', 'price' => 50]); // Harga per jam
        $startTime = now()->addDay()->format('Y-m-d\TH:i');
        $endTime = now()->addDay()->addHours(2)->format('Y-m-d\TH:i');
    
        $data = [
            'room_id' => $room->id,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'price' => 100, // 50 * 2 jam
        ];
    
        // Act: Mengirim request POST untuk menyimpan booking
        $response = $this->post(route('bookings.store'), $data);
    
        // Ambil ID booking terbaru yang dibuat oleh user ini
        $bookingId = DB::table('bookings')
                      ->where('user_id', $this->userId)
                      ->where('room_id', $room->id)
                      ->latest('id') // Ambil entri terbaru berdasarkan ID
                      ->value('id');
    
        // Assert: Memeriksa hasil
        $response->assertRedirect(route('payments.create', ['booking_id' => $bookingId]));
        $this->assertDatabaseHas('bookings', [
            'user_id' => $this->userId,
            'room_id' => $room->id,
            'status' => 'P', // Pending
            'price' => 100,
        ]);
    }

    
    
    #[Test]
    public function it_fails_to_store_booking_with_invalid_times()
    {
        // Arrange: Membuat data dummy untuk room menggunakan model
        $room = Room::factory()->create(['status' => 'A', 'price' => 50]);
        $startTime = now()->addDay()->format('Y-m-d\TH:i');
        $endTime = now()->addDay()->format('Y-m-d\TH:i'); // Waktu yang sama, harus gagal
    
        $data = [
            'room_id' => $room->id,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'price' => 50,
        ];
    
        // Act: Mengirim request POST untuk menyimpan booking
        $response = $this->post(route('bookings.store'), $data);
    
        // Assert: Memeriksa hasil
        $response->assertStatus(302) // Redirect back dengan error
                 ->assertSessionHasErrors(['end_time' => 'The end time field must be a date after start time.']);
        $this->assertDatabaseMissing('bookings', [
            'room_id' => $room->id,
            'start_time' => $startTime,
        ]);
    }

    #[Test]
    public function it_cancels_booking_and_redirects()
    {
        // Arrange: Membuat data dummy untuk room dan booking menggunakan model
        $room = Room::factory()->create(['status' => 'A']);
        $booking = Booking::factory()->create([
            'user_id' => $this->userId, // Gunakan userId dari query builder
            'room_id' => $room->id,
            'status' => 'C', // Confirmed
        ]);

        // Act: Mengirim request DELETE untuk membatalkan booking
        $response = $this->delete(route('bookings.destroy', $booking->id));

        // Assert: Memeriksa hasil
        $response->assertRedirect(route('bookings.index'))
                 ->assertSessionHas('success', 'Booking cancelled successfully.');
        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'D', // Cancelled
        ]);
    }

    
    #[Test]
    public function it_shows_transaction_history()
    {
        // Arrange: Membuat data dummy untuk room dan booking menggunakan model, payment menggunakan query builder
        $room = Room::factory()->create();
        $booking = Booking::factory()->create([
            'user_id' => $this->userId, // Gunakan userId dari query builder
            'room_id' => $room->id,
            'status' => 'C', // Confirmed
        ]);
    
        // Simulasi data payment (karena menggunakan raw query) dengan transaction_id
        DB::table('payments')->insert([
            'booking_id' => $booking->id,
            'amount' => $booking->price,
            'payment_type' => 'credit_card',
            'status' => 'settlement',
            'transaction_id' => 'TXN_' . uniqid(), // Menggunakan uniqid() untuk menghasilkan string unik
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Act: Mengakses route untuk history transaksi
        $response = $this->get(route('transactions.history'));
    
        // Assert: Memeriksa hasil
        $response->assertStatus(200)
                 ->assertViewIs('transactions.history')
                 ->assertViewHas('transactions', function ($transactions) use ($booking) {
                     return $transactions->count() === 1 && $transactions->first()->id === $booking->id;
                 });
    }

    #[Test]
    public function it_shows_booking_list()
    {
        // Hapus baris ini: $this->actingAs($this->user);
    
        // Arrange: Membuat data dummy untuk room dan booking menggunakan model
        $room = Room::factory()->create(['status' => 'A']);
        Booking::factory()->create([
            'user_id' => $this->userId, // Gunakan userId dari query builder
            'room_id' => $room->id,
            'status' => 'C', // Confirmed
        ]);
    
        // Act: Mengakses route untuk daftar booking
        $response = $this->get(route('bookings.list'));
    
        // Assert: Memeriksa hasil
        $response->assertStatus(200)
                 ->assertViewIs('bookings.indexbookinglist')
                 ->assertViewHas('bookings', function ($bookings) {
                     return $bookings->count() === 1 && $bookings->first()->status === 'C';
                 });
    }

    
    
    #[Test]
    public function it_shows_available_rooms_by_ccategory()
    {
        // Arrange: Membuat data dummy untuk category dan room menggunakan model
        $category = Category::factory()->create();
        $room = Room::factory()->create([
            'category_id' => $category->id,
            'status' => 'A', // Room yang tersedia
        ]);
    
        // Act: Mengakses route dengan filter category
        $response = $this->get(route('bookings.showRooms', ['category_id' => $category->id]));
    
        // Assert: Memeriksa hasil
        $response->assertStatus(200)
                 ->assertViewIs('bookings.showRooms')
                 ->assertViewHas('rooms', function ($rooms) use ($room) {
                     return $rooms->count() === 1 && $rooms->first()->id === $room->id;
                 })
                 ->assertViewHas('categories', function ($categories) use ($category) {
                     return $categories->contains($category);
                 });
    }
    #[Test]
    public function it_shows_booked_rooms()
    {
        // Arrange: Membuat data dummy untuk category, room, dan booking menggunakan model
        $category = Category::factory()->create();
        $room = Room::factory()->create(['category_id' => $category->id, 'status' => 'A']);
        Booking::factory()->create([
            'room_id' => $room->id,
            'status' => 'C', // Confirmed
            'user_id' => $this->userId, // Gunakan userId dari query builder
        ]);

        // Act: Mengakses route untuk booked rooms
        $response = $this->get(route('bookings.bookedRooms'));

        // Assert: Memeriksa hasil
        $response->assertStatus(200)
                 ->assertViewIs('bookings.bookedRooms')
                 ->assertViewHas('bookings', function ($bookings) use ($room) {
                     return $bookings->count() === 1 && $bookings->first()->room_id === $room->id;
                 })
                 ->assertViewHas('categories');
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
}