<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\MenuMeal;
use App\Models\Menu;
use Route;
use Cart;

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
    public function cart()
    {
        return view('page.cart');
    }

    public function checkout()
    {
        return view('page.checkout');
    }

    public function getRoutes()
    {
        $routes = collect(Route::getRoutes())->map(function ($route) { return $route->uri(); });
        return collect(Route::getRoutes())->toArray();
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
            Route::get('/get-routes', 'PageController@getRoutes')->name('getroutes');
        });
    }
}
