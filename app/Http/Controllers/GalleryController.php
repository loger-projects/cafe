<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Route;

class GalleryController extends Controller
{
    public function apiIndex($amount)
    {
        return $amount == 'all' ? Gallery::all() : Gallery::skip(0)->take($amount)->get();
    }

    public function apiGetByAmount($skip, $take)
    {
        return Gallery::skip($skip)->take($take)->get();
    }

    public static function routes()
    {
        Route::get('/api/galleries/{amount}', 'GalleryController@apiIndex')->name('api.gallery.index');
        Route::get('/api/galleries/skip/{skip}/take/{amount}', 'GalleryController@apiGetByAmount')->name('api.gallery.getByAmount');
    }
}
