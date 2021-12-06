<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Role::truncate();
        $items = [
            ['id' => 1, 'role' => 'admin'],
            ['id' => 2, 'role' => 'Employee'],
            ['id' => 3, 'role' => 'Customer'],

            
        ];
        //inserts data in items to database
        foreach($items as $item)
        {
            Role::create($item);
        }
    }
}
