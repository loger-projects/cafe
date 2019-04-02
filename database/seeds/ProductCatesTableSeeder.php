<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ProductCatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i <= 7; $i++) {
            $name = implode(' ', $faker->words(2));
            $slug = str_slug($name);
            $description = $faker->sentence(4);
            $url = url('/product/category/'.$slug);
            DB::table('product_cates')->insert([
                'name' => $name,
                'description' => $description,
                'slug' => $slug,
                'url' => $url,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
