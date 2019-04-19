<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Route;

class CartController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return Cart::content();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function add(Request $request)
    {
        $product = $request->product;
        Cart::add([
            'id' => $product['id'],
            'name' => $product['name'],
            'qty' => $request->qty,
            'price' => $product['price'],
            'options' => [
                'thumbnail' => $product['thumbnail'],
            ]
            ]);
        return $cart = Cart::content();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function update()
    {
        $product = $request->all();
        Cart::update($product['rowId'], $product['qty']);
        return $cart = Cart::content();
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function remove(Request $request)
    {
        Cart::remove($request->rowId);
        return $cart = Cart::content();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function destroy()
    {
        Cart::destroy();
        return 'destroyed';
    }

    public function total()
    {
        return Cart::total();
    }

    public function test()
    {
        return 'abcd';
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function routes()
    {
        Route::group([
            'prefix' => 'api/cart'
        ], function() {
            Route::name('api.cart.')->group(function() {
                Route::get('/', 'CartController@index')->name('index');
                Route::post('/add', 'CartController@add')->name('add');
                Route::patch('/update/{id}', 'CartController@update')->name('update');
                Route::post('/remove', 'CartController@remove')->name('remove');
                Route::get('/destroy', 'CartController@destroy')->name('destroy');
                Route::get('/total', 'CartController@total')->name('total');
            });
        });
    }
}
