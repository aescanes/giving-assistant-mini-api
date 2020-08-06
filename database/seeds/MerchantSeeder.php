<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table('merchants')->insert([
                'name' => 'Brahmin',
                'category_id' => 1
            ]);
            DB::table('merchants')->insert([
                'name' => 'DoorDash',
                'category_id' => 1
            ]);
            DB::table('merchants')->insert([
                'name' => 'Home Depot',
                'category_id' => 2
            ]);

        }
    }
}
