<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;


class CategoryRoomTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();


        Category::create([
            'id' => 1,
            'name' => 'Standard Room',
            'description' => 'A basic room with essential amenities',
            'image' => 'standard.jpg',
            'facility' => 'Wi-Fi, TV',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    
    public function test_create_category()
    {
        
        $categoryData = [
            'name' => 'Deluxe Room',
            'description' => 'A luxurious room with premium amenities',
            'image' => 'deluxe.jpg',
            'facility' => 'Wi-Fi, TV, Minibar',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        
        Category::create($categoryData);

        
        $category = Category::where('name', 'Deluxe Room')->first();

        
        $this->assertNotNull($category); // Pastikan data ada
        $this->assertEquals('Deluxe Room', $category->name); // Pastikan nama sesuai
        $this->assertEquals('A luxurious room with premium amenities', $category->description); // Pastikan deskripsi sesuai
        $this->assertEquals('deluxe.jpg', $category->image); // Pastikan gambar sesuai
        $this->assertEquals('Wi-Fi, TV, Minibar', $category->facility); // Pastikan fasilitas sesuai
    }

    
    public function test_read_category()
    {
    
        $category = Category::where('name', 'Standard Room')->first();

    
        $this->assertNotNull($category); // Pastikan data ada
        $this->assertEquals('Standard Room', $category->name); // Pastikan nama sesuai
        $this->assertEquals('A basic room with essential amenities', $category->description); // Pastikan deskripsi sesuai
        $this->assertEquals('standard.jpg', $category->image); // Pastikan gambar sesuai
        $this->assertEquals('Wi-Fi, TV', $category->facility); // Pastikan fasilitas sesuai
    }

    
    public function test_update_category()
    {
    
        $updatedData = [
            'description' => 'Updated standard room description',
            'facility' => 'Wi-Fi, TV, Coffee Maker',
        ];

        
        $category = Category::where('name', 'Standard Room')->first();
        $category->update($updatedData);

        
        $updatedCategory = Category::where('name', 'Standard Room')->first();

        
        $this->assertNotNull($updatedCategory); // Pastikan data ada
        $this->assertEquals('Standard Room', $updatedCategory->name); // Pastikan nama tetap sama
        $this->assertEquals('Updated standard room description', $updatedCategory->description); // Pastikan deskripsi sesuai
        $this->assertEquals('Wi-Fi, TV, Coffee Maker', $updatedCategory->facility); // Pastikan fasilitas sesuai
    }

    
    public function test_delete_category()
    {
        
        $category = Category::where('name', 'Standard Room')->first();
        $category->delete();

        
        $category = Category::where('name', 'Standard Room')->first();

        
        $this->assertNull($category); // Pastikan data tidak ada
    }

    /** Clean up the test environment */
    protected function tearDown(): void
    {
        // Clean up any additional categories created during tests
        Category::where('name', 'Deluxe Room')->delete();
        parent::tearDown();
    }
}