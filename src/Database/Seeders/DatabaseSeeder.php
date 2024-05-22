<?php

namespace Packages\RoleManager\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            PermissionClassificationSeeder::class,
            PermissionTableSeeder::class,
            RolePermissionTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
