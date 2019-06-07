<?php

use App\Repository\Seeders\RolesSeeder;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new RolesSeeder())->run();
    }
}
