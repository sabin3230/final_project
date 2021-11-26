<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PermissionComponent;
use DB;

class PermissionComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        PermissionComponent::truncate();
        $items = [
            ['id' => 1, 'component' => 'User Management'],
            ['id' => 2, 'component' => 'Role Management'],
            ['id' => 3, 'component' => 'Permission'],
            ['id' => 4, 'component' => 'Permission Component'],
            ['id' => 5, 'component' => 'Organization'],
        ];

        foreach($items as $item)
        {
            PermissionComponent::create($item);
        }
    }
}
