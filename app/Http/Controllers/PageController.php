<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
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

    /**
     * Undocumented function
     *
     * @return void
     */
    public function checkout()
    {
        return view('page.checkout');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function checkoutEnd()
    {
        $user = Auth::user();

        if(session('user_'.$user->id.'_last_order')) {
            return redirect()->route('site.page.home');
        }

        return view('page.checkoutEnd');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getRoutes()
    {
        $routes = collect(Route::getRoutes())->map(function ($route) { return $route->uri(); });
        return collect(Route::getRoutes())->toArray();
    }

    /**
     * 
     * @return void
     */
    public function checkUrl()
    {
        return URL::previous();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function routes()
    {
        Route::name('site.page.')->group(function() {
            Route::get('/', 'PageController@sitePageHome')->name('home');
            Route::get('/cart', 'PageController@cart')->name('cart');
            Route::get('/checkout', 'PageController@checkout')->name('checkout')->middleware('auth');
            Route::get('/checkout/end', 'PageController@checkoutEnd')->name('checkout.end')->middleware('auth');
            Route::get('/get-routes', 'PageController@getRoutes')->name('getroutes');
            Route::get('/check-url', 'PageController@checkUrl')->name('checkUrl');
        });
    }
}
