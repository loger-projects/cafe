<?php

namespace App\Http\Controllers;

use App\Models\ProductCate;
use App\Models\Product;
use Illuminate\Http\Request;
use Route;

class ProductCateController extends Controller
{
    /**
     * API Methods
     */

    public function apiIndex($amount)
    {
        $categories = $amount == 'all' ? ProductCate::all() : ProductCate::inRandomOrder()->skip(0)->take($amount)->get();

        foreach($categories as $category) {
            $category->count = Product::where('cate_id', $category->id)->count();
        }

        return $categories;
    }

    public static function routes()
    {
        Route::group([
            'prefix' => 'api/product/categories'
        ], function() {
            Route::name('api.product.category.')->group(function() {
                Route::get('/{amount}', 'ProductCateController@apiIndex')->name('index');
            });
        });
    }
}
