<?php

namespace Tests\Integrated;


use App\Models\Admin;
use App\Models\Role;
use App\Repository\Seeders\RolesSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolesTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    protected $admin, $role;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = factory(Admin::class)->create();
        $this->role = factory(Role::class)->create();
    }

    /*
     * this method tests if an admin can add a role
     */
    public function test_admin_can_add_role()
    {
        $this->withExceptionHandling();
        (new RolesSeeder())->run();
        $roles = Role::get();
        $this->admin->roles()->attach($roles);
        $data = [
            'name' => $this->faker->name,
        ];

        $this->actingAs($this->admin, 'admin')->post(action('Admin\RolesController@store'), $data)
            ->assertSessionHasNoErrors()
            ->assertRedirect();
        $this->assertDatabaseHas('roles', $data);
    }

    /*
    * this function will test if an admin can view  roles
    */

    public function test_an_admin_can_view_roles()
    {
        $this->withExceptionHandling();
        $this->actingAs($this->admin, 'admin')->get(action('Admin\RolesController@index'))
            ->assertSessionHasNoErrors()
            ->assertSuccessful()
            ->assertSee($this->role->name);
    }

    /*
     * this function will test if an admin can update a role
     */

    public function test_an_admin_can_update_role()
    {
        $this->withExceptionHandling();
        $data = [
            'name' => $this->faker->name,
            'slug' => $this->faker->name,
        ];
        $this->actingAs($this->admin, 'admin')->post(action('Admin\RolesController@update', $this->role->id), $data)
            ->assertSessionHasNoErrors()->assertRedirect();
        $role = $this->role->fresh();
        $this->assertEquals($role->name, $data['name']);
    }

    /*
    * this function will test if an admin can delete a role
    */

    public function test_an_admin_can_delete_role()
    {
        $this->withExceptionHandling();
        $this->actingAs($this->admin, 'admin')->get(action('Admin\RolesController@delete', $this->role->id))
            ->assertSessionHasNoErrors()->assertRedirect();
        $role = $this->role->fresh();
        $this->assertEquals(0, $role);
    }

}
