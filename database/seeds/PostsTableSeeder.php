<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Models\PostCate;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cates = PostCate::all();
        foreach($cates as $cate) {
            for($i = 1; $i<= 3; $i++) {
                $faker = Faker::create();
                $title = $faker->sentence();
                $slug = str_slug($title) + '/post';
                $content = implode(' ', $faker->paragraphs);
                $excerpt = substr($content, 1, 50).' ...';
                DB::table('posts')->insert([
                    'cate_id' => $cate->id,
                    'user_id' => 1,
                    'title' => $title,
                    'slug' => $slug,
                    'content' => $content,
                    'excerpt' => $excerpt,
                    'published' => true,
                    'allow_preview' => false,
                    'thumbnail' => asset('/img/posts/post_thumbnail_'.$i.'.jpg'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
    }
}
