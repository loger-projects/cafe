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

        // Product Seeder

        $this->call(ProductCatesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductReviewsTableSeeder::class);
        $this->call(ProductUserTableSeeder::class);

        // Galleries Seeder

        $this->call(GalleriesTableSeeder::class);
    }
}
