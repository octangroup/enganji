<?php


namespace App\Repository\Seeders;


use App\Models\Role;

class RolesSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(
            [
                'id' => 1,
                'name' => 'Manage product'
            ]
        );
        Role::create(
            [
                'id' => 2,
                'name' => 'Manage affiliate'
            ]
        );
        Role::create(
            [
                'id' => 3,
                'name' => 'Update Content'
            ]
        );
        Role::create(
            [
                'id' => 4,
                'name' => 'Communication'
            ]
        );
    }
}
