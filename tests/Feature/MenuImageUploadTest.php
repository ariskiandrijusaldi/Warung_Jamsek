<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Concerns\AuthenticatesCashier;
use Tests\TestCase;

class MenuImageUploadTest extends TestCase
{
    use AuthenticatesCashier, RefreshDatabase;

    public function test_cashier_can_upload_menu_image(): void
    {
        Storage::fake('public');
        $menuItem = $this->createMenuItem();

        $response = $this->post('/api/v1/cashier/menu-items/'.$menuItem->id.'/image', [
            'image' => UploadedFile::fake()->image('menu.jpg'),
        ], $this->cashierHeaders());

        $response->assertOk();

        $path = $response->json('data.image_path');
        $this->assertStringStartsWith('menu-images/', $path);
        Storage::disk('public')->assertExists($path);
        $this->assertSame($path, $menuItem->fresh()->image_url);
    }

    public function test_cashier_can_delete_menu_image(): void
    {
        Storage::fake('public');
        $menuItem = $this->createMenuItem();
        $headers = $this->cashierHeaders();

        $this->post('/api/v1/cashier/menu-items/'.$menuItem->id.'/image', [
            'image' => UploadedFile::fake()->image('menu.jpg'),
        ], $headers)->assertOk();

        $path = $menuItem->fresh()->image_url;

        $this->deleteJson('/api/v1/cashier/menu-items/'.$menuItem->id.'/image', [], $headers)
            ->assertOk();

        Storage::disk('public')->assertMissing($path);
        $this->assertNull($menuItem->fresh()->image_url);
    }

    public function test_menu_image_must_be_an_image(): void
    {
        Storage::fake('public');
        $menuItem = $this->createMenuItem();

        $this->post('/api/v1/cashier/menu-items/'.$menuItem->id.'/image', [
            'image' => UploadedFile::fake()->create('menu.pdf', 100, 'application/pdf'),
        ], $this->cashierHeaders())->assertUnprocessable()->assertJsonValidationErrors('image');
    }

    private function createMenuItem(): MenuItem
    {
        $category = Category::create([
            'name' => 'Makanan',
            'slug' => 'makanan',
        ]);

        return MenuItem::create([
            'category_id' => $category->id,
            'name' => 'Ayam Rica Rica',
            'slug' => 'ayam-rica-rica',
            'price' => 20000,
        ]);
    }
}
