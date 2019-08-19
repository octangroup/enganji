<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Console\Command;

class AddRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:roles {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add roles to the admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $admin = Admin::where('email', $this->argument('email'))->firstOrFail();
        $roles = Role::get();

        foreach ($roles as $role) {
            $admin->roles()->detach($role->id);
            $admin->roles()->attach($role->id);
        }
    }
}
