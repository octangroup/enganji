<?php

namespace Tests\Feature;

use App\Category;
use App\Product;
use App\SubCategory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    //testing to get products on the Home page
    public function test_home_page_product_retrieval(): void
    {
        $category = factory(Category::class)->create();
        $subcategory = factory(SubCategory::class)->create(['category_id' => $category->id]);
        $product = factory(Product::class)->create(['subcategory_id' => $subcategory->id]);
        dump($category->stripped_name);
        $this->get(action('ProductsController@index', [$category->stripped_name, $category->id]))
            ->assertSuccessful()
            ->assertSee($product->name);
    }


    public function test_can_view_product()
    {
        $product = factory(Product::class)->create();
        $this->get(action('ProductsController@show', [$product->id]))
            ->assertSuccessful()
            ->assertSee($product->name);
    }


}
