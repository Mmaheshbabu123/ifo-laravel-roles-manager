<?php

namespace Packages\RoleManager\Database\Seeders;

use Packages\RoleManager\App\Models\Permission;
use Packages\RoleManager\App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        Role::findOrFail(2)->permissions()->sync([1,2]);

    }
}
