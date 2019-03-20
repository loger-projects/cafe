<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\MenuMeal;
use App\Models\Menu;
use Route;

class PageController extends Controller
{
    public function sitePageHome()
    {
        return view('pages.SitePageHome');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function test()
    {
        return view('test');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function routes()
    {
        Route::get('/', 'PageController@sitePageHome')->name('site.page.home');
        Route::get('/test', 'PageController@test')->name('test');
    }
}
