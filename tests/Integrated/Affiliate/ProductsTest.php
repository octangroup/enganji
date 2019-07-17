<?php

namespace Tests\Integrated;

use App\Models\Affiliate;
use App\Models\Brand;
use App\Models\Condition;
use App\Models\Currency;
use App\Models\Product;
use App\Models\SubCategory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    protected $affiliate;

    protected function setUp(): void
    {
        parent::setUp();
        $this->affiliate = factory(Affiliate::class)->create();
    }

    /*
     * this function tests if the store method in controller works properly
     */
    public function test_affiliate_create_product()
    {
        $this->withExceptionHandling();
        $subcategory = factory(SubCategory::class)->create();
        $attributes = $this->generateAttributes($subcategory);
        $this->actingAs($this->affiliate, 'affiliate')->post(action('Affiliate\ProductsController@store'), $this->formData($subcategory, $attributes))
            ->assertRedirect()->assertSessionHasNoErrors();
        $this->assertDatabaseHas('products', $attributes);
    }

    /*
    * this function tests if the update method in controller works properly
    */

    public function test_affiliate_can_update_product()
    {
        $this->withExceptionHandling();
        $product = factory(Product::class)->create(['affiliate_id' => $this->affiliate->id]);

        // Creating a product from another affiliate
        $productTwo = factory(Product::class)->create();

        $subcategory = factory(SubCategory::class)->create();
        $attributes = $this->generateAttributes($subcategory);
        $this->actingAs($this->affiliate, 'affiliate')->patch(action('Affiliate\ProductsController@update', $productTwo->id), $this->formData($subcategory, $attributes))
            ->assertSessionHasNoErrors()->assertNotFound();
        $this->assertDatabaseMissing('products', $attributes);
        $this->actingAs($this->affiliate, 'affiliate')->patch(action('Affiliate\ProductsController@update', $product->id), $this->formData($subcategory, $attributes))
            ->assertSessionHasNoErrors()->assertRedirect();
        $this->assertDatabaseHas('products', $attributes);
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

    /**
     * @param $subcategory
     * @return array
     */
    public function generateAttributes($subcategory): array
    {
        $attributes = [
            'affiliate_id' => $this->affiliate->id,
            'subcategory_id' => $subcategory->id,
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
        return $attributes;
    }

    /**
     * @param $subcategory
     * @param array $attributes
     * @return array
     */
    public function formData($subcategory, array $attributes): array
    {
        return [
            'category' => $subcategory->category_id,
            'subcategory' => $attributes['subcategory_id'],
            'currency' => $attributes['currency_id'],
            'brand' => $attributes['brand_id'],
            'condition' => $attributes['condition_id'],
            'name' => $attributes['name'],
            'quantity' => $attributes['quantity'],
            'price' => $attributes['price'],
            'color' => $attributes['color'],
            'size' => $attributes['size'],
            'description' => $attributes['description'],
            'type' => '1'
        ];
    }

}
