<?php

namespace Tests\Integrated;


use App\Models\Admin;
use App\Models\Currency;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CurrencyTest extends TestCase
{
   use RefreshDatabase,WithFaker;
   protected $admin;
   protected function setUp(): void
   {
       parent::setUp();
       $this->admin = factory(Admin::class)->create();
   }

    /*
      * @Test if the method of storing new  categories works perfectly
      */
    public function test_an_admin_can_create_currencies()
    {

        $this->withExceptionHandling();
        $attributes = [
            'name' => $this->faker->name,
        ];
        $this->actingAs($this->admin, 'admin')->post(action('Admin\CurrencyController@store'), $attributes)->assertSessionHasNoErrors();
        $this->assertDatabaseHas('currencies', $attributes);
    }

    /*
     * @test if the method of viewing or retrieving categories works perfectly
     */
    public function test_can_retrieve_currency()
    {
        $this->withExceptionHandling();
        $currency = factory(Currency::class)->create();
        $this->actingAs($this->admin, 'admin')->get(action('Admin\CurrencyController@index'))
            ->assertSessionHasNoErrors()
            ->assertSuccessful()
            ->assertSee($currency->name);
    }
    /*
     * @test if the method of updating categories works perfectly
     */
    public function test_can_update_currency()
    {
        $this->withExceptionHandling();
        $currency = factory(Currency::class)->create();
        $attributes = [
            'name' => $this->faker->name,
        ];
        $this->actingAs($this->admin, 'admin')->patch(action('Admin\CurrencyController@update', $currency->id), $attributes)
            ->assertSessionHasNoErrors()->assertRedirect();
        $currency = $currency->refresh();
        $this->assertEquals($currency->name, $attributes['name']);


    }

    /*
     * Test if the method of deleting categories works properly
     */

    public function test_can_delete_currency()
    {
        $this->withExceptionHandling();
        $currency = factory(Currency::class)->create();
        $this->actingAs($this->admin, 'admin')->get(action('Admin\CurrencyController@destroy', $currency->id))
            ->assertSessionHasNoErrors()->assertRedirect();
        $currency = $currency->fresh();
        $this->assertEquals(0,$currency);

    }


}
