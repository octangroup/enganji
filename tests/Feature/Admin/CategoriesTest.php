<?php

namespace Tests\Feature;

use App\Admin;
use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriesTest extends TestCase
{
    Use RefreshDatabase, WithFaker;

    protected $admin;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = factory(Admin::class)->create();
    }


    /*
      * @Test if the method of storing new  categories works perfectly
      */
    public function test_an_admin_can_create_categories()
    {

        $this->withExceptionHandling();
        $attributes = [
            'name' => $this->faker->name,
        ];
        $this->actingAs($this->admin, 'admin')->post(action('Admin\CategoriesController@store'), $attributes)->assertSessionHasNoErrors();
        $this->assertDatabaseHas('categories', $attributes);
    }

    /*
     * @test if the method of viewing or retrieving categories works perfectly
     */
    public function test_can_retrieve_categories()
    {
        $this->withExceptionHandling();
        $category = factory(Category::class)->create();
        $this->actingAs($this->admin, 'admin')->get(action('Admin\CategoriesController@index'))
            ->assertSessionHasNoErrors()
            ->assertSuccessful()
            ->assertSee($category->name);
    }

    /*
     * @test if the method of updating categories works perfectly
     */
    public function test_can_update_category()
    {
        $this->withExceptionHandling();
        $category = factory(Category::class)->create();
        $attributes = [
            'name' => $this->faker->name,
        ];
        $this->actingAs($this->admin, 'admin')->patch(action('Admin\CategoriesController@update', $category->id), $attributes)
            ->assertSessionHasNoErrors()->assertRedirect();
        $category = $category->fresh();
        $this->assertEquals($category->name, $attributes['name']);


    }

    /*
     * Test if the method of deleting categories works properly
     */

    public function test_can_delete_category()
    {
        $this->withExceptionHandling();
        $category = factory(Category::class)->create();
        $this->actingAs($this->admin, 'admin')->get(action('Admin\CategoriesController@destroy', $category->id))
            ->assertSessionHasNoErrors()->assertRedirect();
         $category = $category->fresh();
        $this->assertEquals(0,$category);

    }

}
