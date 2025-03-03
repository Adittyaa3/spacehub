<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed the roles table
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'User', 'description' => 'Default user role', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Admin', 'description' => 'Administrator role', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seed initial user data
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'adit',
            'email' => 'adit@example.com',
            'password' => bcrypt('password123'),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /** Test creating a user via the store method */
    public function test_create_user()
    {
        // Data for creating a new user
        $userData = [
            'name' => 'adit baru',
            'email' => 'aditbaru@gmail.com',
            'password' => 'password123',
            'phone_number' => '1234567890',
            'institution' => 'airlangga',
            'imageProfil' => 'profile.jpg',
            'role_id' => 1,
        ];

        // Simulate POST request to store method
        $this->post(route('users.store'), $userData);

        // Retrieve the created user
        $user = DB::table('users')->where('email', 'aditbaru@gmail.com')->first();

        // Assertions
        $this->assertNotNull($user);
        $this->assertEquals('adit baru', $user->name);
        $this->assertEquals('aditbaru@gmail.com', $user->email);
        $this->assertTrue(Hash::check('password123', $user->password));
        $this->assertEquals('1234567890', $user->phone_number);
        $this->assertEquals('airlangga', $user->institution);
        $this->assertEquals('profile.jpg', $user->imageProfil);
        $this->assertEquals(1, $user->role_id);
    }

    /** Test reading a user */
    public function test_read_user()
    {
        // Retrieve the seeded user
        $user = DB::table('users')->where('email', 'adit@example.com')->first();

        // Assertions
        $this->assertNotNull($user);
        $this->assertEquals('adit', $user->name);
        $this->assertEquals('adit@example.com', $user->email);
        $this->assertTrue(Hash::check('password123', $user->password));
        $this->assertEquals(1, $user->role_id);
    }

    public function test_update_user()
    {
        // Data yang akan diperbarui
        $updatedData = [
            'name' => 'adit updated',
            'email' => 'aditupdated@example.com',
            'password' => bcrypt('newpass123'), // Directly hash the password as in controller
            'role_id' => 2,
        ];

        // Perbarui data di tabel users menggunakan Query Builder
        DB::table('users')->where('id', 1)->update($updatedData);

        // Ambil data yang baru diperbarui
        $user = DB::table('users')->where('id', 1)->first();

        // Assertions
        $this->assertNotNull($user); // Pastikan data ada
        $this->assertEquals('adit updated', $user->name); // Pastikan nama sesuai
        $this->assertEquals('aditupdated@example.com', $user->email); // Pastikan email sesuai
        $this->assertTrue(Hash::check('newpass123', $user->password)); // Pastikan password sesuai
        $this->assertEquals(2, $user->role_id); // Pastikan role_id sesuai
    }

    /** Test deleting a user via the destroy method */
    public function test_delete_user()
    {
        // Simulate DELETE request to destroy method
        $this->delete(route('users.destroy', 1));

        // Attempt to retrieve the deleted user
        $user = DB::table('users')->where('id', 1)->first();

        // Assertion
        $this->assertNull($user);
    }

    /** Clean up the test environment */
    protected function tearDown(): void
    {
        // Clean up any additional users created during tests
        DB::table('users')->where('email', 'aditbaru@gmail.com')->delete();
        DB::table('users')->where('email', 'aditupdated@example.com')->delete();
        parent::tearDown();
    }
}