<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Models\Post;
use App\Models\PostComment;

class PostCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $faker = Faker::create();
        foreach($posts as $post) {
            for($i = 1; $i <= 2; $i++) {
                DB::table('post_comments')->insert([
                    'post_id' => $post->id,
                    'user_id' => 1,
                    'parent_id' => null,
                    'level' => 0,
                    'content' => $faker->paragraph(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
            $comments = PostComment::where('post_id', $post->id)->get();
            foreach($comments as $comment) {
                for($j = 1; $j <= 2; $j++) {
                    DB::table('post_comments')->insert([
                        'post_id'=> $post->id,
                        'user_id' => 1,
                        'parent_id' => $comment->id,
                        'level' => 1,
                        'content'=> $faker->paragraph(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }
            $level_1_comments = PostComment::where('post_id', $post->id, 'and')->where('level', 1)->get();
            foreach($level_1_comments as $comment) {
                for($i = 1; $i<= 3; $i++) {
                    DB::table('post_comments')->insert([
                        'post_id' => $post->id,
                        'user_id' => 1,
                        'parent_id' => $comment->id,
                        'level' => 2,
                        'content' => $faker->paragraph(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }
        }
    }
}
