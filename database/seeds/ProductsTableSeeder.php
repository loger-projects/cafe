<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Models\ProductCate;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cates = ProductCate::all();
        $faker = Faker::create();
        $id = 1;
        foreach($cates as $cate) {
            for($i = 1; $i <= 6; $i++) {
                $name = implode(' ', $faker->words(3));
                $slug = str_slug($name);
                $url = url('product/'.$slug);
                $description = implode(' ', $faker->sentences(3));
                $price = rand(5, 100);
                $inStock = true;
                $isNew = false;
                $rating = rand(0, 5);
                $quantity = rand(100, 200);
                $availableQuantity = $quantity - rand(10, 50);
                $soldQuantity = $quantity - $availableQuantity;
                $thumbnail = url('img/products/product_thumbnail_'.$id.'.jpg');
                $id++;
                DB::table('products')->insert([
                    'cate_id' => $cate->id,
                    'name' => $name,
                    'slug' => $slug,
                    'url' => $url,
                    'description' => $description,
                    'price' => $price,
                    'in_stock' => $inStock,
                    'is_new' => $isNew,
                    'rating' => $rating,
                    'quantity' => $quantity,
                    'available_quantity' => $availableQuantity,
                    'sold_quantity' => $soldQuantity,
                    'thumbnail' => $thumbnail,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
    }
}
