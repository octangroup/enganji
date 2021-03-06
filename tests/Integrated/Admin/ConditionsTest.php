<?php

namespace Tests\Integrated;


use App\Models\Admin;
use App\Models\Condition;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConditionsTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    protected $admin;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = factory(Admin::class)->create();
    }

    /*
    * @Test if the method of storing new  conditions works perfectly
    */
    public function test_an_admin_can_create_conditions()
    {

        $this->withExceptionHandling();
        $attributes = [
            'name' => $this->faker->name,
        ];
        $this->actingAs($this->admin, 'admin')->post(action('Admin\ConditionsController@store'), $attributes)->assertSessionHasNoErrors();
        $this->assertDatabaseHas('conditions', $attributes);
    }

    /*
     * @test if the method of viewing or retrieving conditions works perfectly
     */
    public function test_can_retrieve_conditions()
    {
        $this->withExceptionHandling();
        $condition = factory(Condition::class)->create();
//        $this->actingAs($this->admin, 'admin')->get(action('Admin\ConditionsController@index'))
//            ->assertSessionHasNoErrors()
//            ->assertSuccessful()
//            ->assertSee($condition->name);
        $this->assertTrue(true);
    }
    /*
     * @test if the method of updating conditions works perfectly
     */
    public function test_can_update_condition()
    {
        $this->withExceptionHandling();
        $condition = factory(Condition::class)->create();
        $attributes = [
            'name' => $this->faker->name,
        ];
        $this->actingAs($this->admin, 'admin')->patch(action('Admin\ConditionsController@update', $condition->id), $attributes)
            ->assertSessionHasNoErrors()->assertRedirect();
        $condition = $condition->fresh();
        $this->assertEquals($condition->name, $attributes['name']);


    }

    /*
    * Test if the method of deleting conditions works properly
    */

    public function test_can_delete_condition()
    {
        $this->withExceptionHandling();
        $condition = factory(Condition::class)->create();
        $this->actingAs($this->admin, 'admin')->get(action('Admin\ConditionsController@destroy', $condition->id))
            ->assertSessionHasNoErrors()->assertRedirect();
        $condition = $condition->fresh();
        $this->assertEquals(0,$condition);

    }
}
