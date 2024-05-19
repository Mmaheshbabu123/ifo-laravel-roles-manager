<?php

namespace Database\Seeders;

use App\Models\PermissionClassifications;
use Illuminate\Database\Seeder;

class PermissionClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      PermissionClassifications::create([
          'name' => 'User management',

      ]);
      PermissionClassifications::create([
          'name' => 'Permission management',
      ]);

      PermissionClassifications::create([
          'name' => 'Role management',
      ]);

    }
}
