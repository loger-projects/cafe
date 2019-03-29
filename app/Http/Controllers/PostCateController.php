<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\User;
use App\Models\PostCate;
use Illuminate\Http\Request;
use Route;

class PostCateController extends Controller
{
    public function show($slug)
    {
        return view('postCate.show');
    }
    /**
     * Undocumented function
     *
     * @param [type] $amount
     * @return void
     */
    public function apiIndex($amount)
    {
        $categories = $amount == 'all' ? PostCate::all() : PostCate::inRandomOrder()->skip(0)->take($amount)->get();

        foreach($categories as $category) {
            $category->count = Post::where('cate_id', $category->id)->count();
        }

        return $categories;
    }

    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return void
     */
    public function apiShow($slug)
    {
        $category = PostCate::where('slug', $slug)->first();

        $posts = Post::where('cate_id', $category->id)->paginate(5);

        foreach($posts as $post) {
            $post->comment_count = PostComment::where('post_id', $post->id)->count();
            $post->author = User::where('id', $post->user_id)->first();
        }

        return ['category' => $category, 'posts' => $posts];
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function routes()
    {
        Route::group([
            'prefix' => 'post/category'
        ],function() {
            Route::name('post.category.')->group(function() {
                Route::get('/{slug}', 'PostCateController@show')->name('show');
            });
        });

        Route::group([
            'prefix' => 'api/post/categories'
        ],function() {
            Route::name('api.post.category.')->group(function() {
                Route::get('/{amount}', 'PostCateController@apiIndex')->name('index');
            });
        });

        Route::group([
            'prefix' => 'api/post/category'
        ],function() {
            Route::name('api.post.category.')->group(function() {
                Route::get('/{slug}', 'PostCateController@apiShow')->name('.show');
            });
        });
    }
}
