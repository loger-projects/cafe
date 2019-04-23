<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use App\Models\Product;
use Illuminate\Http\Request;
use Route;

class ProductReviewController extends Controller
{
    public function apiStore(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
            'rating' => 'required|max:5',
            'content' => 'required'
        ]);

        

        $review = ProductReview::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'content' => $request->content,
        ]);

        // update product rating

        $product = Product::find($request->product_id);

        //increase rating_count
        $product->rating_count += 1;
        
        // get sum of rating from all reviews
        $reviews = $product->reviews;
        $sum_rating = 0;

        foreach($reviews as $review) {
            $sum_rating += $review->rating;
        }

        $product->rating = $sum_rating / $product->rating_count;
        
        $product->save();

        $user = $review->user;
        return ['review' => $review, 'product' => $product];
    }
    public static function routes()
    {
        Route::group([
            'prefix' => 'api/product/review/'
        ],function() {
            Route::name('api.product.review.')->group(function() {
                Route::post('/store', 'ProductReviewController@apiStore')->name('store');
            });
        });
    }
}
