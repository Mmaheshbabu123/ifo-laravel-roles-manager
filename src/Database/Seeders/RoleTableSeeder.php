<?php

namespace Packages\RoleManager\Database\Seeders;

use Packages\RoleManager\App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'title' => 'Administrator',
            'short_code' => 'Admin',
        ]);

        Role::create([
            'title' => 'User',
        ]);
    }
}
