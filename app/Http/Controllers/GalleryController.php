<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Route;

class GalleryController extends Controller
{
    public static function routes()
    {
        Route::get('/api/galleries/{amount}')->name('api.gallery.index');
    }
}
