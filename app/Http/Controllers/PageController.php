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
        $meal = MenuMeal::where('id', 1)->first();
        $food = [];
        $drink = [];
        foreach ($meal->menus as $menu) {
            if ($menu->type->is_food) {
                $food[] = $menu->name;
            } else {
                $drink[] = $menu->name;
            }
        }
        $array = ['food' => $food, 'drink' => $drink];
        return $array;
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
