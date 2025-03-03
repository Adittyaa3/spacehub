<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class MenusTest extends TestCase
{
    use RefreshDatabase;

    /** Test untuk menampilkan semua menu */
    public function test_index()
    {
        // Menambahkan beberapa menu menggunakan query builder
        DB::table('menus')->insert([
            ['name' => 'Menu 1', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Menu 2', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Menu 3', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Akses endpoint untuk menampilkan menu
        $response = $this->get(route('menus.index'));

        // Memastikan response sukses dan data menus ada
        $response->assertStatus(200);
        $response->assertViewHas('menus');
        $response->assertViewIs('menus.index');

        // Memastikan jumlah menu yang ditampilkan sesuai dengan yang disemai
        $response->assertSee('Menu 1');
        $response->assertSee('Menu 2');
        $response->assertSee('Menu 3');
    }

    /** Test untuk menampilkan detail menu */
    public function test_show()
    {
        // Menambahkan satu menu menggunakan query builder
        $menu = DB::table('menus')->insertGetId([
            'name' => 'Menu Detail',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Akses endpoint untuk melihat detail menu
        $response = $this->get(route('menus.show', $menu));

        // Memastikan response sukses dan data menu ada
        // $response->assertStatus(200);
        // $response->assertViewHas('menu');
        // $response->assertViewIs('menus.show');
        // $response->assertSee('Menu Detail');
    }

    /** Test untuk menampilkan form create */
    public function test_create()
    {
        // Akses endpoint untuk form create
        $response = $this->get(route('menus.create'));

        // Memastikan response sukses
        $response->assertStatus(200);
        $response->assertViewIs('menus.create');
    }

    /** Test untuk menyimpan menu baru */
    public function test_store()
    {
        // Data menu yang akan disimpan
        $data = [
            'name' => 'Menu Baru',
            'icon' => 'icon',
            'url' => '/menu-baru',
            'parent_id' => null,
            'status' => 1
        ];

        // Kirim data ke endpoint untuk menyimpan menu
        $response = $this->post(route('menus.store'), $data);

        // Memastikan response sukses dan redirect ke halaman index
        $response->assertRedirect(route('menus.index'));
        $response->assertSessionHas('success', 'Menu berhasil ditambahkan.');

        // Memastikan menu berhasil disimpan di database
        $this->assertDatabaseHas('menus', [
            'name' => 'Menu Baru',
            'status' => 1,
        ]);
    }

    /** Test untuk menampilkan form edit menu */
    public function test_edit()
    {
        // Menambahkan satu menu menggunakan query builder
        $menu = DB::table('menus')->insertGetId([
            'name' => 'Menu Edit',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Akses endpoint untuk form edit menu
        $response = $this->get(route('menus.edit', $menu));

        // Memastikan response sukses dan data menu ada
        $response->assertStatus(200);
        $response->assertViewHas('menu');
        $response->assertViewIs('menus.edit');
        $response->assertSee('Menu Edit');
    }

    /** Test untuk mengupdate menu */
    public function test_update()
    {
        // Menambahkan satu menu menggunakan query builder
        $menu = DB::table('menus')->insertGetId([
            'name' => 'Menu Lama',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Data yang akan diupdate
        $data = [
            'name' => 'Menu Diperbarui',
            'icon' => 'icon2',
            'url' => '/menu-diperbarui',
            'parent_id' => null,
            'status' => 1
        ];

        // Kirim data untuk mengupdate menu
        $response = $this->put(route('menus.update', $menu), $data);

        // Memastikan response sukses dan redirect ke halaman index
        $response->assertRedirect(route('menus.index'));
        $response->assertSessionHas('success', 'Menu berhasil diperbarui.');

        // Memastikan menu berhasil diperbarui di database
        $this->assertDatabaseHas('menus', [
            'name' => 'Menu Diperbarui',
            'url' => '/menu-diperbarui',
        ]);
    }

    /** Test untuk menghapus menu */
    public function test_destroy()
    {
        // Menambahkan satu menu menggunakan query builder
        $menu = DB::table('menus')->insertGetId([
            'name' => 'Menu Hapus',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Kirim request untuk menghapus menu
        $response = $this->delete(route('menus.destroy', $menu));

        // Memastikan response sukses dan redirect ke halaman index
        $response->assertRedirect(route('menus.index'));
        $response->assertSessionHas('success', 'Menu berhasil dihapus.');

        // Memastikan menu tidak ada lagi di database
        $this->assertDatabaseMissing('menus', [
            'id' => $menu
        ]);
    }

    /** Test untuk sidebar menu */
    public function test_sidebar()
    {
        // Menambahkan beberapa menu dengan status 1
        $menus = DB::table('menus')->insert([
            ['name' => 'Menu Sidebar 1', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Menu Sidebar 2', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Menu Sidebar 3', 'status' => 0, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Akses endpoint untuk sidebar
        $response = $this->get(route('menus.sidebar'));

        // Memastikan response sukses dan data menu sidebar ada
        $response->assertStatus(200);
        $response->assertViewHas('menus');
        $response->assertViewIs('layouts.sidebar');

        // Memastikan hanya menu dengan status aktif yang ditampilkan
        $response->assertSee('Menu Sidebar 1');
        $response->assertSee('Menu Sidebar 2');
        $response->assertDontSee('Menu Sidebar 3');
    }
}