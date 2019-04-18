<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i <= 21; $i++) {
            DB::table('galleries')->insert([
                'title' => $faker->sentence(),
                'description' => implode(' ', $faker->sentences(3)),
                'src' => url('/img/galleries/gallery_'.$i.'.jpg'),
                'alt' => 'Gallery_'.$i.' is not found',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now
            ]);
        }
    }
}
