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
            ['id' => 6, 'component' => 'Vehicle Model'],
            ['id' => 7, 'component' => 'Employee'],
            ['id' => 8, 'component' => 'Department'],
            ['id' => 9, 'component' => 'Branch'],
            ['id' => 10, 'component' => 'Customer'],
            ['id' => 11, 'component' => 'Customer_vehicle'],
            ['id' => 12, 'component' => 'Booking'],
            ['id' => 13, 'component' => 'Issue'],
            ['id' => 14, 'component' => 'servicing'],
            ['id' => 15, 'component' => 'vehcilebooking'],
            ['id' => 16, 'component' => 'Contact'],
            ['id' => 17, 'component' => 'Feedback'],
            ['id' => 18, 'component' => 'Dashboard'],
            ['id' => 19, 'component' => 'attendance'],




        ];

        foreach($items as $item)
        {
            PermissionComponent::create($item);
        }
    }
}
