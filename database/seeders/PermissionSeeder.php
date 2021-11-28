<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use DB;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Permission::truncate();
        $items = [
            ['permission' => 'user-access', 'p_component_id' => 1],
            ['permission' => 'role-access', 'p_component_id' => 2 ],
            ['permission' => 'role-add', 'p_component_id' => 2 ],
            ['permission' => 'role-edit', 'p_component_id' => 2 ],
            ['permission' => 'role-view', 'p_component_id' => 2 ],
            ['permission' => 'role-delete', 'p_component_id' => 2 ],
            ['permission' => 'role-action', 'p_component_id' => 2 ],
            ['permission' => 'permission-access', 'p_component_id' => 3 ],
            ['permission' => 'permission-add', 'p_component_id' => 3 ],
            ['permission' => 'permission-edit', 'p_component_id' => 3 ],
            ['permission' => 'permission-view', 'p_component_id' => 3 ],
            ['permission' => 'permission-delete', 'p_component_id' => 3 ],
            ['permission' => 'permission-action', 'p_component_id' => 3 ],
            ['permission' => 'permission_comp_add', 'p_component_id' => 4],
            ['permission' => 'org-add', 'p_component_id' => 5],
            ['permission' => 'org-view', 'p_component_id' => 5],
            ['permission' => 'org-delete', 'p_component_id' => 5],
            ['permission' => 'org-edit', 'p_component_id' => 5],
            ['permission' => 'vehicle-model-action', 'p_component_id' => 6],
            ['permission' => 'vehicle-model-add', 'p_component_id' => 6],
            ['permission' => 'vehicle-model-view', 'p_component_id' => 6],
            ['permission' => 'vehicle-model-edit', 'p_component_id' => 6],
            ['permission' => 'vehicle-model-delete', 'p_component_id' => 6],


        ];

        foreach ($items as $item) {
            Permission::create($item);
        }
        DB::table('role_permissions')->truncate();
        $permissions = Permission::all();

        // Populate the pivot table
        Role::all()->each(function ($roles) use ($permissions) { 
            $roles->permissions()->attach(
                $permissions
            ); 
        });
    }
}
