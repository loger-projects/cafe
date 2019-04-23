<?php

namespace App\Http\Controllers;

use App\Models\ProductCate;
use App\Models\Product;
use Illuminate\Http\Request;
use Route;

class ProductCateController extends Controller
{
    public function show($slug)
    {
        return view('ProductCate.show');
    }
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

    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return void
     */
    public function apiShow($slug)
    {
        return ProductCate::where('slug', $slug)->first();
    }

    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return void
     */
    public function apiProducts($slug)
    {
        $category = ProductCate::where('slug', $slug)->first();
        return Product::where('cate_id', $category->id)->paginate(9);
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @param [type] $filter
     * @return void
     */
    public function apiFilter($id, $filter)
    {
        $category = ProductCate::find($id);
        switch($filter) {
            case 'popularity':
                return Product::where('cate_id', $category->id)->orderBy('sold_quantity', 'desc')->paginate(9);
            break;
            case 'rating':
                return Product::where('cate_id', $category->id)->orderBy('rating', 'desc')->paginate(9);
            break;
            case 'latest':
                return Product::where('cate_id', $category->id)->latest()->paginate(9);
            break;
            case 'price-low-to-high':
                return Product::where('cate_id', $category->id)->orderBy('price', 'asc')->paginate(9);
            break;
            case 'price-high-to-low':
                return Product::where('cate_id', $category->id)->orderBy('price', 'desc')->paginate(9);
            break;
            default:
                return Product::where('cate_id', $category->id)->paginate(9);
            break;
        }
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

        Route::group([
            'prefix' => '/product/category'
        ],function() {
            Route::name('product.category')->group(function() {
                Route::get('/{slug}', 'ProductCateController@show')->name('show');
            });
        });

        Route::group([
            'prefix' => 'api/product/category'
        ], function() {
            Route::name('api.product.category.')->group(function() {
                Route::get('/{slug}', 'ProductCateController@apiShow')->name('show');
                Route::get('/{slug}/products', 'ProductCateController@apiProducts')->name('products');
                Route::get('/{id}/filter/{filter}', 'ProductcateController@apiFilter')->name('filter');
            });
        });
    }
}
