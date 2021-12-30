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
            ['permission' => 'org-action', 'p_component_id' => 5 ],
            ['permission' => 'org-add', 'p_component_id' => 5],
            ['permission' => 'org-view', 'p_component_id' => 5],
            ['permission' => 'org-delete', 'p_component_id' => 5],
            ['permission' => 'org-edit', 'p_component_id' => 5],
            ['permission' => 'vehicle-model-action', 'p_component_id' => 6],
            ['permission' => 'vehicle-model-add', 'p_component_id' => 6],
            ['permission' => 'vehicle-model-view', 'p_component_id' => 6],
            ['permission' => 'vehicle-model-edit', 'p_component_id' => 6],
            ['permission' => 'vehicle-model-delete', 'p_component_id' => 6],
            ['permission' => 'employee-action', 'p_component_id' => 7],
            ['permission' => 'employee-add', 'p_component_id' => 7],
            ['permission' => 'employee-view', 'p_component_id' => 7],
            ['permission' => 'employee-edit', 'p_component_id' => 7],
            ['permission' => 'employee-delete', 'p_component_id' => 7],
            ['permission' => 'department-action', 'p_component_id' => 8],
            ['permission' => 'department-add', 'p_component_id' => 8],
            ['permission' => 'department-view', 'p_component_id' => 8],
            ['permission' => 'department-edit', 'p_component_id' => 8],
            ['permission' => 'department-delete', 'p_component_id' => 8],
            ['permission' => 'branch-action', 'p_component_id' => 9],
            ['permission' => 'branch-add', 'p_component_id' => 9],
            ['permission' => 'branch-view', 'p_component_id' => 9],
            ['permission' => 'branch-edit', 'p_component_id' => 9],
            ['permission' => 'branch-delete', 'p_component_id' => 9],
            ['permission' => 'customer-action', 'p_component_id' => 10],
            ['permission' => 'customer-add', 'p_component_id' => 10],
            ['permission' => 'customer-view', 'p_component_id' => 10],
            ['permission' => 'customer-edit', 'p_component_id' => 10],
            ['permission' => 'customer-delete', 'p_component_id' => 10],
            ['permission' => 'customer-vehicle-action', 'p_component_id' => 11],
            ['permission' => 'customer-vehicle-add', 'p_component_id' => 11],
            ['permission' => 'customer-vehicle-view', 'p_component_id' => 11],
            ['permission' => 'customer-vehicle-edit', 'p_component_id' => 11],
            ['permission' => 'customer-vehicle-delete', 'p_component_id' => 11],
            ['permission' => 'booking-action', 'p_component_id' => 12],
            ['permission' => 'booking-add', 'p_component_id' => 12],
            ['permission' => 'booking-view', 'p_component_id' => 12],
            ['permission' => 'booking-edit', 'p_component_id' => 12],
            ['permission' => 'booking-delete', 'p_component_id' => 12],
            ['permission' => 'issue-action', 'p_component_id' => 13],
            ['permission' => 'issue-add', 'p_component_id' => 13],
            ['permission' => 'issue-view', 'p_component_id' => 13],
            ['permission' => 'issue-edit', 'p_component_id' => 13],
            ['permission' => 'issue-delete', 'p_component_id' => 13],
            ['permission' => 'servicing-action', 'p_component_id' => 14],
            ['permission' => 'servicing-add', 'p_component_id' => 14],
            ['permission' => 'servicing-view', 'p_component_id' => 14],
            ['permission' => 'servicing-edit', 'p_component_id' => 14],
            ['permission' => 'servicing-delete', 'p_component_id' => 14],




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
