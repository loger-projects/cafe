<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Route;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * API Methods
     */

    public function apiIndex()
    {
        return Product::latest()->get();
    }

    public function apiShow($slug)
    {
        return Product::where('slug', $slug)->first();
    }

    public static function routes()
    {
        Route::group([
            'prefix' => 'products'
        ],function() {
            Route::name('product.')->group(function() {
                Route::get('/', 'ProductController@index')->name('index');
            });
        });

        Route::group([
            'prefix' => 'product'
        ],function() {
            Route::name('product.')->group(function() {
                Route::get('/{slug}', 'ProductController@show')->name('show');
            });
        });

        Route::group([
            'prefix' => 'api/products'
        ],function() {
            Route::name('api.product.')->group(function() {
                Route::get('/', 'ProductController@apiIndex')->name('index');
            });
        });

        Route::group([
            'prefix' => 'api/product'
        ],function() {
            Route::name('api.product')->group(function() {
                Route::get('/{slug}', 'ProductController@apiShow')->name('show');
            });
        });
    }
}
