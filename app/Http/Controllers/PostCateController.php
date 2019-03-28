<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCate;
use Illuminate\Http\Request;
use Route;

class PostCateController extends Controller
{
    public function apiIndex($amount)
    {
        $categories = $amount == 'all' ? PostCate::all() : PostCate::inRandomOrder()->skip(0)->take($amount)->get();

        foreach($categories as $category) {
            $category->count = Post::where('cate_id', $category->id)->count();
        }

        return $categories;
    }
    public static function routes()
    {
        Route::get('api/post/categories/{amount}', 'PostCateController@apiIndex')->name('api.post.category.index');

        Route::group([
            'prefix' => 'post/category'
        ],function() {
            Route::name('post.category.')->group(function() {
                Route::get('/{slug}', 'PostCateController@show')->name('show');
            });
        });
    }
}
