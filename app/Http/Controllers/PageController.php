<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function process()
    {
        return view('process');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function routes()
    {
        Route::get('/', 'PageController@home')->name('home');
        Route::get('/process', 'PageController@process')->name('process');
    }
}
