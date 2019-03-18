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
        // option seeder
        $this->call(OptionsTableSeeder::class);

        // User Seeder

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        // Post Seeder

        $this->call(PostCatesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PostCommentsTableSeeder::class);

        // Menu Seeder

        $this->call(MenuMealsTableSeeder::class);
        $this->call(MenuTypesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuMealTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(MenuIngredientTableSeeder::class);

        //
    }
}
