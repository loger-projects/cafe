<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;


class PostCatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 7; $i++) {
            $name = implode(' ', $faker->words(2));
            $slug = str_slug($name);
            $url = url('/post/category/'.$slug);
            DB::table('post_cates')->insert([
                'name' => $name,
                'description' => 'Post Category '.$i.' description',
                'slug' => $slug,
                'url' => $url,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
