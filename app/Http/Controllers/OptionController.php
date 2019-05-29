<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use Route;

class OptionController extends Controller
{
    public function siteInfo()
    {
        $options = Option::select('key', 'value')->where('type', 'siteInfo')->get();
        $array = [];
        foreach ($options as $option) {
            $array[$option->key] = $option->value;
        }
        return $array;
    }

    public function route($name)
    {
        return route($name);
    }

    public function previousURL(Request $request)
    {
        $previousURL = $request->session()->get('previousURL');
        $request->session()->forget('previousURL');
        return $previousURL;
    }

    public static function routes()
    {
        Route::group([
            'prefix' => 'api/option'
        ],function(){
            Route::name('api.option.')->group(function() {
                Route::get('/site-info', 'OptionController@siteInfo')->name('siteInfo');
                Route::get('/route/{name}', 'OptionController@route')->name('route');
                Route::get('/previous-url', 'OptionController@previousURL')->name('previousURL');
            });
        });
    }
}
