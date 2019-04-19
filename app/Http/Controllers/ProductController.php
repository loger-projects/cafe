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

    /**
     * Undocumented function
     *
     * @return void
     */
    public function apiIndex()
    {
        return Product::paginate(9);
    }

    /**
     * Undocumented function
     *
     * @param [type] $filter
     * @return void
     */
    public function apiIndexFilter($filter)
    {
        switch($filter) {
            case 'popularity':
                return Product::orderBy('sold_quantity', 'desc')->paginate(9);
            break;
            case 'rating':
                return Product::orderBy('rating', 'desc')->paginate(9);
            break;
            case 'latest':
                return Product::latest()->paginate(9);
            break;
            case 'price-low-to-high':
                return Product::orderBy('price', 'asc')->paginate(9);
            break;
            case 'price-high-to-low':
                return Product::orderBy('price', 'desc')->paginate(9);
            break;
            default:
                return Product::paginate(9);
            break;
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return void
     */
    public function apiShow($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $category = $product->category;
        return $product;
    }

    public function apiRelated($id)
    {
        $product = Product::where('id', $id)->first();
        return Product::where('cate_id', $product->cate_id, 'and')->where('id', '!=', $id)->inRandomOrder()->take(3)->get();
    }

    public function apiReviews($id)
    {
        $reviews = Product::find($id)->reviews;
        foreach($reviews as $review) {
            $user = $review->user;
        }
        return $reviews;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
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
                Route::get('/filter/{filter}', 'ProductController@apiIndexFilter')->name('index.filter');
            });
        });

        Route::group([
            'prefix' => 'api/product'
        ],function() {
            Route::name('api.product')->group(function() {
                Route::get('/{slug}', 'ProductController@apiShow')->name('show');
                Route::get('/{id}/related', 'ProductController@apiRelated')->name('related');
                Route::get('/{id}/reviews', 'ProductController@apiReviews')->name('reviews');
            });
        });
    }
}
