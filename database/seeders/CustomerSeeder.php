<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Customer::truncate();
        $items = [
            [
                'user_id'=>2
            ],
            
        ];

        foreach($items as $item){
            Customer::create($item);
        }
    }
}
