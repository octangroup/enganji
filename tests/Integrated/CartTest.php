<?php

namespace Tests\Integrated;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    use WithFaker, RefreshDatabase;
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


    public function test_user_can_add_to_cart()
    {
        $attributes = [
            'user_id' => $this->user->id,
            'product_id' => factory(Product::class)->create()->id,
            'quantity' => 1,
        ];

        $this->actingAs($this->user)->post(action('CartController@store'), $attributes)
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertDatabaseHas('carts', $attributes);
    }


    public function test_user_can_view_cart()
    {
        $cart = factory(Cart::class)->create(['user_id' => $this->user->id]);
        $this->actingAs($this->user)->get(action('CartController@index'))
            ->assertSuccessful()
            ->assertSee($cart->quantity);
    }


    public function test_user_can_delete_cart()
    {

        $cart = factory(Cart::class)->create();
        $this->actingAs($this->user)->get(action('CartController@destroy', $cart->id))
            ->assertSessionHasNoErrors()->assertRedirect();
        $cart = $cart->fresh();
        $this->assertEquals(0, $cart);
    }


}
