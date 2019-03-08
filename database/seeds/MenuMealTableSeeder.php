<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class MenuMealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = Menu::all()->toArray();
        /**
         * 1 meal > 3 types > Food: 3*3 + Drink: 3*3
         */
        /**
         * FoodID: 0 - 8, 9 - 17, 18 - 26
         * DrinkID: 27 - 35, 36 - 44, 45 - 53,
         * meal_id = 0: 0 - 8 && 27 - 35
         * meal_id = 1: 9 - 17 && 36 - 44
         * meal_id = 2: 18 - 26 && 45 - 53
         */        
        /**
         * Breakfast - meal_id = 0
         */
        $mealID = 1;
        for($i = 0; $i <= 8; $i++) {
            $menuID = $menus[$i]['id'];
            DB::table('menu_meal')->insert(
                [
                    'menu_id' => $menuID,
                    'meal_id' => $mealID
                ]
            );
        }
        for($j = 27; $j <= 35; $j++) {
            $menuID = $menus[$j]['id'];
            DB::table('menu_meal')->insert(
                [
                    'menu_id' => $menuID,
                    'meal_id' => $mealID
                ]
            );
        }
        /**
         * Lunch - meal_id = 1
         */
        $mealID = 2;
        for($i = 9; $i <= 17; $i++) {
            $menuID = $menus[$i]['id'];
            DB::table('menu_meal')->insert(
                [
                    'menu_id' => $menuID,
                    'meal_id' => $mealID
                ]
            );
        }
        for($j = 36; $j <= 44; $j++) {
            $menuID = $menus[$j]['id'];
            DB::table('menu_meal')->insert(
                [
                    'menu_id' => $menuID,
                    'meal_id' => $mealID
                ]
            );
        }
        /**
         * Dinner - meal_id = 2
         */
        $mealID = 3;
        for($i = 18; $i <= 26; $i++) {
            $menuID = $menus[$i]['id'];
            DB::table('menu_meal')->insert(
                [
                    'menu_id' => $menuID,
                    'meal_id' => $mealID
                ]
            );
        }
        for($j = 45; $j <= 53; $j++) {
            $menuID = $menus[$j]['id'];
            DB::table('menu_meal')->insert(
                [
                    'menu_id' => $menuID,
                    'meal_id' => $mealID
                ]
            );
        }
    }
}
