<?php

namespace Tests\Integrated;

use App\Models\Admin;
use App\Models\Brand;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BrandTest extends TestCase
{
    Use RefreshDatabase, WithFaker;
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = factory(Admin::class)->create();
    }

    /*
       * @Test if the method of storing new  brand works perfectly
       */
    public function test_an_admin_can_create_brand()
    {

        $this->withExceptionHandling();
        $attributes = [
            'name' => $this->faker->name,
        ];
        $this->actingAs($this->admin, 'admin')->post(action('Admin\BrandController@store'), $attributes)->assertSessionHasNoErrors();
        $this->assertDatabaseHas('brands', $attributes);
    }

    /*
         * @test if the method of updating brands works perfectly
         */
    public function test_can_update_brand()
    {
        $this->withExceptionHandling();
        $brand = factory(Brand::class)->create();
        $attributes = [
            'name' => $this->faker->name,
        ];
        $this->actingAs($this->admin, 'admin')->patch(action('Admin\BrandController@update', $brand->id), $attributes)
            ->assertSessionHasNoErrors()->assertRedirect();
        $brand = $brand->fresh();
        $this->assertEquals($brand->name, $attributes['name']);


    }

    /*
        * Test if the method of deleting brands works properly
        */

    public function test_can_delete_brand()
    {
        $this->withExceptionHandling();
        $brand = factory(Brand::class)->create();
        $this->actingAs($this->admin, 'admin')->get(action('Admin\BrandController@destroy', $brand->id))
            ->assertSessionHasNoErrors()->assertRedirect();
        $brand = $brand->fresh();
        $this->assertEquals(0, $brand);

    }

    /*
         * @test if the method of viewing or retrieving brands works perfectly
         */
    public function test_can_retrieve_brands()
    {
        $this->withExceptionHandling();
        $brand = factory(Brand::class)->create();
        $this->actingAs($this->admin, 'admin')->get(action('Admin\BrandController@index'))
            ->assertSessionHasNoErrors()
            ->assertSuccessful()
            ->assertSee($brand->name);
    }


}
