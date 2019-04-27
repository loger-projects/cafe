<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Route;

class OrderDetailController extends Controller
{
    public function apiStore()
    {
        
    }

    public static function routes()
    {
        Route::group([
            'prefix' => 'api/orderDetail'
        ], function() {
            Route::name('api.orderDetail.')->group(function() {
                Route::post('store', 'OrderDetailController@apiStore')->name('store');
            });
        });
    }
}
