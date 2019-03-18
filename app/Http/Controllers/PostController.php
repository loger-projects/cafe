<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Route;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('post.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function apiLatestPosts($number)
    {
        return Post::where('id', '>=', 1)->orderBy('created_at', 'desc')->skip(0)->take($number)->get()->toArray();
    }

    public function apiShow($slug)
    {
        return Post::where('slug', $slug)->first();
    }

    public static function routes()
    {
        Route::name('post.')->group(function() {
            Route::get('/posts', 'PostController@index')->name('index');
            Route::get('/post/show/{slug}', 'PostController@show')->name('show');
        });
        Route::name('api.post')->group(function() {
            Route::get('/api/post/{number}/latest-posts', 'PostController@apiLatestPosts')->name('latestPosts');
            Route::get('/api/post/show/{slug}', 'PostController@apiShow')->name('show');
        });
    }
}
