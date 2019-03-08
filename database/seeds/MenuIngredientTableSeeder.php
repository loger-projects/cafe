<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Ingredient;

class MenuIngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = Menu::all();
        $ingredients = Ingredient::all();
        foreach ($menus as $menu) {
            foreach ($ingredients as $ingredient) {
                DB::table('menu_ingredient')->insert([
                    'menu_id' => $menu->id,
                    'ingredient_id' => $ingredient->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
    }
}
