<?php

namespace Packages\RoleManager\Database\Seeders;

use Packages\RoleManager\App\Models\Permission;
use Illuminate\Database\Seeder;
use Packages\RoleManager\App\Models\PermissionClassifications;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $permissions = [
          // Admin panel permissions
          [
              'classification' => 'User management',
              'permissions' => [
                  [
                      'name' => 'admin_panel_access',
                      'constant_key' => 'a_p_a',
                      'classification_type' => 0,
                  ],
                  [
                      'name' => 'users_access',
                      'constant_key' => 'u_access',
                      'classification_type' => 0,
                  ],
                  [
                      'name' => 'user_edit',
                      'constant_key' => 'e_user',
                      'classification_type' => 0,
                  ],
                  [
                      'name' => 'user_delete',
                      'constant_key' => 'e_delete',
                      'classification_type' => 0,
                  ],
                  [
                      'name' => 'user_create',
                      'constant_key' => 'c_user',
                      'classification_type' => 0,
                  ],
                  [
                      'name' => 'user_show',
                      'constant_key' => 's_user',
                      'classification_type' => 0,
                  ],
              ],
          ],
          // Role permissions
          [
              'classification' => 'Role management',
              'permissions' => [
                  [
                      'name' => 'roles_access',
                      'constant_key' => 'r_access',
                      'classification_type' => 0,
                  ],
                  [
                      'name' => 'role_edit',
                      'constant_key' => 'e_role',
                      'classification_type' => 0,
                  ],
                  [
                      'name' => 'role_delete',
                      'constant_key' => 'd_role',
                      'classification_type' => 0,
                  ],
                  [
                      'name' => 'role_create',
                      'constant_key' => 'c_role',
                      'classification_type' => 0,
                  ],
                  [
                      'name' => 'role_show',
                      'constant_key' => 's_role',
                      'classification_type' => 0,
                  ],
              ],
          ],
          // Permission permissions
          [
              'classification' => 'Permission management',
              'permissions' => [
                  [
                      'name' => 'permissions_access',
                      'constant_key' => 'p_access',
                      'classification_type' => 0,
                  ],
                  [
                      'name' => 'permission_edit',
                      'constant_key' => 'e_permission',
                      'classification_type' => 0,
                  ],
                  [
                      'name' => 'permission_delete',
                      'constant_key' => 'd_permission',
                      'classification_type' => 0,
                  ],
                  [
                      'name' => 'permission_create',
                      'constant_key' => 'c_permission',
                      'classification_type' => 0,
                  ],
              ],
          ],
      ];

      foreach ($permissions as $classificationGroup) {
          $classificationName = $classificationGroup['classification'];
          $classificationId = PermissionClassifications::where('name', $classificationName)->pluck('id')->first();

          foreach ($classificationGroup['permissions'] as $permission) {
              $permission['classification_type'] = $classificationId;
              Permission::create($permission);
          }
      }
    }
  }
