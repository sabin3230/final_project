<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Employee::truncate();
        $items = [
            [
                'first_name'=>'admin', 
                'last_name'=>'admin',
                'address'=>'admi9n',
                'contact'=>'4566',
                'email' => 'admin@admin.com', 
                'password' => bcrypt('hello123'), 
                'role_id' => 1,
                
            ],
            [
                'first_name'=>'customer', 
                'last_name'=>'customer',
                'address'=>'customer',
                'contact'=>'4566',
                'email' => 'c@c.com', 
                'password' => bcrypt('hello123'), 
                'role_id' => 3,
                
            ],
        ];

        foreach($items as $item){
            User::create($item);
        }
    }
}
