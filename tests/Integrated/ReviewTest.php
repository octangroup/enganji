<?php

namespace Tests\Integrated;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }


    public function test_user_can_review_product()
    {
        $product = factory(Product::class)->create();
        $attributes = [
            'rating' => $this->faker->randomNumber(),
            'title' => $this->faker->word,
            'body' => $this->faker->text,

        ];
        $this->actingAs($this->user)->post(action('ReviewController@store', $product->id), $attributes)
            ->assertSessionHasNoErrors()
            ->assertRedirect();

    }


    public function test_user_can_retrieve_review()
    {
        $product = factory(Product::class)->create();
        $review = factory(Review::class)->create(['product_id' => $product->id]);
        $this->get(action('ProductsController@show', $product->id))
            ->assertSuccessful()
            ->assertSee($review->title);

    }

}
