<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;

class PageController extends Controller
{
    public function sitePageHome()
    {
        return view('pages.SitePageHome');
    }

    public function adminPageHome()
    {
        return view('pages.AdminPageHome');
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
        Route::get('/', 'PageController@sitePageHome')->name('site.page.home');
        Route::get('/admin', 'PageController@adminPageHome')->name('admin.page.home');
    }
}
