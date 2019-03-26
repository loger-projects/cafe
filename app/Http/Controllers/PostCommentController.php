<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use App\Models\User;
use Route;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    /**
     * 
     */
    public function apiStore(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'post_id' => 'required',
            'level'   => 'required',
            'content' => 'required'
        ]);
        $data = $request->all();
        $comment = PostComment::create($data);
        $comment->user = User::where('id', $request->user_id)->first();
        return $comment;
    }

    public static function routes()
    {
        Route::group([
            'prefix' => 'api/comment'
        ],function () {
            Route::name('api.comment.')->group(function () {
                Route::post('/', 'PostCommentController@apiStore')->name('store');
            });
        });
    }
}
