<?php

namespace Tests\Integrated;

use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubCategoriesTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    protected $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = factory(Admin::class)->create();
    }

    /*
      * @Test if the method of storing new sub category works perfectly
      */
    public function test_can_store_subcategories()
    {
        $this->withExceptionHandling();
        $category = factory(Category::class)->create();
        $attributes = [
            // 'category_id'=>factory(Category::class)->create(),
            'name' => $this->faker->name,
        ];
        $this->actingAs($this->admin, 'admin')->post(action('Admin\SubCategoriesController@store', $category->id), $attributes)
            ->assertSessionHasNoErrors();
        $this->assertDatabaseHas('sub_categories', $attributes);

    }

    /*
    * @Test if the method can update new sub category works perfectly
    */
    public function test_can_update_subcategory()
    {
        $this->withExceptionHandling();
        $sub_category = factory(SubCategory::class)->create();
        $attributes = [
            'category_id' => factory(Category::class)->create()->id,
            'name' => $this->faker->name,
        ];
        $this->actingAs($this->admin, 'admin')->post(action('Admin\SubCategoriesController@update', $sub_category->id), $attributes)
            ->assertSessionHasNoErrors()->assertRedirect();
        $sub_category = $sub_category->fresh(); // refresh so that it can take the update
        $this->assertEquals($sub_category->name, $attributes['name']);
    }

    public function test_can_delete_subcategory()
    {
        $this->withExceptionHandling();
        $sub_category = factory(SubCategory::class)->create();
        $this->actingAs($this->admin, 'admin')->get(action('Admin\SubCategoriesController@destroy', $sub_category->id))
            ->assertSessionHasNoErrors();
        $sub_category = $sub_category->fresh();
        $this->assertEquals(0, $sub_category);
    }

}
