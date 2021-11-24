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
            ['permission' => 'permission_comp_add', 'p_component_id' => 4]
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
