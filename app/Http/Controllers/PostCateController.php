<?php

namespace App\Http\Controllers;

use App\Models\PostCate;
use Illuminate\Http\Request;
use Route;

class PostCateController extends Controller
{
    public function apiRandom($amount)
    {
        return PostCate::inRandomOrder()->skip(0)->take($amount)->get();
    }
    public static function routes()
    {
        Route::group([
            'prefix' => 'api/post/category'
        ], function() {
            Route::name('api.post.category.')->group(function() {
                Route::get('/random/{amount}', 'PostCateController@apiRandom')->name('random');
            });
        });
    }
}
