<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenuTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $food = [];
        for ($i = 1; $i <= 9; $i++) {
            $food[] = ['name' => 'Food Type '.$i, 'is_food' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        }
        $drink = [];
        for ($i = 1; $i <= 9; $i++) {
            $drink[] = ['name' => 'Drink Type '.$i, 'is_food' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        }
        DB::table('menu_types')->insert(array_merge($food, $drink));
           
    }
}