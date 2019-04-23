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
        Route::get('/test', 'PageController@test')->name('test');
        Route::name('site.page.')->group(function() {
            Route::get('/', 'PageController@sitePageHome')->name('home');
            Route::get('/cart', 'PageController@cart')->name('cart');
            Route::get('/checkout', 'PageController@checkout')->name('checkout')->middleware('auth');
        });
    }
}
