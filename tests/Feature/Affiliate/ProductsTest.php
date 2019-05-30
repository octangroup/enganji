<?php

namespace Tests\Feature;

use App\Affiliate;
use App\Brand;
use App\Condition;
use App\Currency;
use App\Product;
use App\SubCategory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    protected $affiliate;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->affiliate = factory(Affiliate::class)->create();
    }

    /*
     * this function tests if the store method in controller works properly
     */
    public function test_affiliate_create_product()
    {

        $attributes = [
            'affiliate_id' => $this->affiliate->id,
            'subcategory_id' => factory(SubCategory::class)->create()->id,
            'currency_id' => factory(Currency::class)->create()->id,
            'brand_id' => factory(Brand::class)->create()->id,
            'condition_id' => factory(Condition::class)->create()->id,
            'name' => $this->faker->name,
            'quantity' => $this->faker->randomNumber(2),
            'price' => $this->faker->randomNumber(3),
            'color' => $this->faker->word,
            'size' => $this->faker->word,
            'description' => $this->faker->text,
        ];
        $this->actingAs($this->affiliate, 'affiliate')->post(action('Affiliate\ProductsController@store'), $attributes)
            ->assertRedirect()->assertSessionHasNoErrors();

        $this->assertDatabaseHas('products', $attributes);
    }

    /*
    * this function tests if the update method in controller works properly
    */

    public function test_affiliate_can_update_product()
    {
        $this->withExceptionHandling();
        $product = factory(Product::class)->create();
        $attributes = [
            'affiliate_id' => $this->affiliate->id,
            'subcategory_id' => factory(SubCategory::class)->create()->id,
            'currency_id' => factory(Currency::class)->create()->id,
            'brand_id' => factory(Brand::class)->create()->id,
            'condition_id' => factory(Condition::class)->create()->id,
            'name' => $this->faker->name,
            'quantity' => $this->faker->randomNumber(2),
            'price' => $this->faker->randomNumber(3),
            'color' => $this->faker->word,
            'size' => $this->faker->word,
            'location' => $this->faker->address,
            'status' => $this->faker->boolean,
            'description' => $this->faker->text,
        ];
        $this->actingAs($this->affiliate, 'affiliate')->patch(action('Affiliate\ProductsController@update', $product->id), $attributes)
            ->assertSessionHasNoErrors()->assertRedirect();
        $product = $product->fresh();
        $this->assertEquals($product->price, $attributes['price']);

    }

    /*
    * this function tests if the delete method in controller works properly
    */
    public function test_affiliate_can_delete_product()
    {
        $this->withExceptionHandling();
        $product = factory(Product::class)->create();
        $this->actingAs($this->affiliate, 'affiliate')->get(action('Affiliate\ProductsController@destroy', $product->id))
            ->assertSessionHasNoErrors()->assertRedirect();
        $product = $product->fresh();
        $this->assertEquals(0, $product);
    }
}
