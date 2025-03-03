<?php

namespace Tests\Unit;

use Tests\TestCase; // Gunakan TestCase dari Laravel
use Illuminate\Support\Facades\DB;

class RoleTest extends TestCase
{
    
    protected function setUp(): void
    {
        parent::setUp();

        // Data yang akan diuji
        $roleData = [
            'name' => 'Administrator',
            'description' => 'Role untuk admin sistem',
        ];

        // Simpan data ke tabel roles menggunakan Query Builder
        DB::table('roles')->insert($roleData);
    }

    public function test_create_role()
    {
        // Ambil data yang baru disimpan
        $role = DB::table('roles')->where('name', operator: 'Administrator')->first();

        // Assertions
        $this->assertNotNull($role); // Pastikan data ada
        $this->assertEquals('Administrator', $role->name); // Pastikan nama sesuai
        $this->assertEquals('Role untuk admin sistem', $role->description); // Pastikan deskripsi sesuai
    }

    /**
     * Test membaca data role menggunakan Query Builder.
     */
    public function test_read_role()
    {
        // Ambil data yang baru disimpan
        $role = DB::table('roles')->where('name', 'Administrator')->first();

        // Assertions
        $this->assertNotNull($role); // Pastikan data ada
        $this->assertEquals('Administrator', $role->name); // Pastikan nama sesuai
        $this->assertEquals('Role untuk admin sistem', $role->description); // Pastikan deskripsi sesuai
    }

    /**
     * Test memperbarui data role menggunakan Query Builder.
     */
    public function test_update_role()
    {
        // Data yang akan diperbarui
        $updatedData = [
            'description' => 'Updated role description',
        ];

        // Perbarui data di tabel roles menggunakan Query Builder
        DB::table('roles')->where('name', 'Administrator')->update($updatedData);

        // Ambil data yang baru diperbarui
        $role = DB::table('roles')->where('name', 'Administrator')->first();

        // Assertions
        $this->assertNotNull($role); // Pastikan data ada
        $this->assertEquals('Updated role description', $role->description); // Pastikan deskripsi sesuai
    }

    /**
     * Test menghapus data role menggunakan Query Builder.
     */
    public function test_delete_role()
    {
        // Hapus data dari tabel roles menggunakan Query Builder
        DB::table('roles')->where('name', 'Administrator')->delete();

        // Ambil data yang baru dihapus
        $role = DB::table('roles')->where('name', 'Administrator')->first();

        // Assertions
        $this->assertNull($role); // Pastikan data tidak ada
    }

    /**
     * Clean up the test environment.
     */
    protected function tearDown(): void
    {
        // Bersihkan data setelah pengujian
        DB::table('roles')->where('name', 'Administrator')->delete();
        parent::tearDown();
    }
}