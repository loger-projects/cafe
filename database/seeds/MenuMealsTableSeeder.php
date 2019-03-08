<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuMealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_meals')->insert([
            ['name' => 'breakfast', 'description' => 'Menu for Breakfast', 'created_at' => new DateTime(), 'updated_at' => new DateTIme()],
            ['name' => 'lunch', 'description' => 'Menu for Lunch', 'created_at' => new DateTime(), 'updated_at' => new DateTIme()],
            ['name' => 'dinner', 'description' => 'Menu for Dinner', 'created_at' => new DateTime(), 'updated_at' => new DateTIme()]
        ]);
    }
}
