<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase; 

    public function testReviewSubmissionForNonExistentProduct(): void
    {
        $response = $this->post("/review/save/99999", [
            'title' => 'Random Title',
            'description' => 'This product does not exist.'
        ]);

        $response->assertStatus(404);
    }

    public function testReviewSubmissionWithTitleNoDescription(): void
    {
        $product = new Product();
        $product = Product::create([
            'name' => 'Test Product',
            'description' => 'Test Product Description',
            'price' => 99.99,
            'quantity' => 10,
            'location' => 'Test Location',
            'image' => 'test.jpg'
        ]);

        $response = $this->post("/review/save/{$product->id}", [
            'title' => 'Has Title But No Description'
            // No description provided.
        ]);

        $response->assertStatus(404);
    }
}
