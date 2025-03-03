<?php

namespace Tests\Unit\ByController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    #[Test]
    public function role_index()
    {
        // Arrange: Membuat data dummy menggunakan query builder
        DB::table('roles')->insert([
            ['name' => 'Admin', 'description' => 'Admin role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'User', 'description' => 'User role', 'created_at' => now(), 'updated_at' => now()]
        ]);

        // Simulasikan pengguna yang login
        $this->actingAs($this->user);

        // Act: Mengakses route index
        $response = $this->get(route('roles.index'));

        // Assert: Memeriksa hasil
        $response->assertStatus(200)
                 ->assertViewIs('role.index')
                 ->assertViewHas('roles', function ($roles) {
                     return $roles->count() === 2;
                 });
    }

    // #[Test]
    // public function it_shows_role_create_page()
    // {
    //     // Simulasikan pengguna yang login
    //     $this->actingAs($this->user);

    //     $response = $this->get(route('roles.create'));
    //     $response->assertStatus(200)
    //              ->assertViewIs('role.index');
    // }

    #[Test]
    public function store_role()
    {
        // Simulasikan pengguna yang login
        $this->actingAs($this->user);

        // Arrange: Data untuk dikirim
        $data = ['name' => 'Editor', 'description' => 'Editor role'];

        // Act: Mengirim request POST
        $response = $this->post(route('roles.store'), $data);

        // Assert: Memeriksa hasil
        $response->assertRedirect(route('roles.index'))
                 ->assertSessionHas('success', 'Role created successfully!');
        $this->assertDatabaseHas('roles', ['name' => 'Editor']);
    }

    #[Test]
    public function role_edit_page()
    {
        // Arrange: Membuat data dummy untuk role menggunakan query builder
        $roleId = DB::table('roles')->insertGetId([
            'name' => 'Manager',
            'description' => 'Manager role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Simulasikan pengguna yang login
        $this->actingAs($this->user);

        // Act: Mengakses route edit
        $response = $this->get(route('roles.edit', $roleId));

        // Assert: Memeriksa hasil
        $response->assertStatus(200)
                 ->assertViewIs('role.edit')
                 ->assertViewHas('role', function ($role) use ($roleId) {
                     return $role->id === $roleId && $role->name === 'Manager';
                 });
    }

    #[Test]
    public function role_update_redirect()
    {
        // Simulasikan pengguna yang login
        $this->actingAs($this->user);

        // Arrange: Membuat data dummy
        $roleId = DB::table('roles')->insertGetId([
            'name' => 'Old Name',
            'description' => 'Old Description',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $newData = ['name' => 'New Name', 'description' => 'New Description'];

        // Act: Mengirim request PUT
        $response = $this->put(route('roles.update', $roleId), $newData);

        // Assert: Memeriksa hasil
        $response->assertRedirect(route('roles.index'))
                 ->assertSessionHas('success', 'Role updated successfully!');
        $this->assertDatabaseHas('roles', ['id' => $roleId, 'name' => 'New Name']);
    }

    #[Test]
    public function it_fails_to_update_nonexistent_role()
    {
        // Simulasikan pengguna yang login
        $this->actingAs($this->user);

        $response = $this->put(route('roles.update', 999), [
            'name' => 'Test',
            'description' => 'Test'
        ]);
        $response->assertRedirect(route('roles.index'))
                 ->assertSessionHas('error', 'Role not found or no changes made.');
    }

    #[Test]
    public function deletes_role_redirects()
    {
        // Simulasikan pengguna yang login
        $this->actingAs($this->user);

        // Arrange: Membuat data dummy
        $roleId = DB::table('roles')->insertGetId([
            'name' => 'Test Role',
            'description' => 'Test Description',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Act: Mengirim request DELETE
        $response = $this->delete(route('roles.destroy', $roleId));

        // Assert: Memeriksa hasil
        $response->assertRedirect(route('roles.index'))
                 ->assertSessionHas('success', 'Role deleted successfully!');
        $this->assertDatabaseMissing('roles', ['id' => $roleId]);
    }

    #[Test]
    public function it_fails_to_delete_nonexistent_role()
    {
        // Simulasikan pengguna yang login
        $this->actingAs($this->user);

        $response = $this->delete(route('roles.destroy', 999));
        $response->assertRedirect(route('roles.index'))
                 ->assertSessionHas('error', 'Role not found.');
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
}