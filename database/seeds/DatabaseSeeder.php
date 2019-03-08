<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(MenuMealsTableSeeder::class);
        $this->call(MenuTypesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuMealTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(MenuIngredientTableSeeder::class);
    }
}
