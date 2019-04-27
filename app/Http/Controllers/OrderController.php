<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Route;
use OrderDetail;
use Cart;

class OrderController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function apiStore(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'street_address' => 'required',
            'city' => 'requried',
            'country' => 'required',
            'zipcode' => 'required',
        ]);
        
        $order = Order::create($request->all);

        if($order) {
           $request->session()->put('user_'.$request->user_id.'_last_order', $order);
        }

        $cart = Cart::content();

        foreach($cart as $key => $product) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['qty'],
                'price' => $product['price']
            ]);
        }

        return 1;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function routes()
    {
        Route::group([
            'prefix' => 'api/order'
        ], function() {
            Route::name('api.order.')->group(function() {
                Route::post('store', 'OrderController@apiStore')->name('store');
            });
        });
    }
}
