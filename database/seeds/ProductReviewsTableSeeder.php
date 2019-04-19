<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Product;
use Carbon\Carbon;

class ProductReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $faker = Faker::create();
        foreach($products as $product) {
            for ($i = 1; $i <= 3; $i++) {
                DB::table('product_reviews')->insert([
                    'product_id' => $product->id,
                    'user_id' => rand(2, 30),
                    'rating' => rand(0, 5),
                    'content' => implode(' ', $faker->sentences(3)),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
