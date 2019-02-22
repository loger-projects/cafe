<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use User;
use ProductCate;
use ProductReview;
use Image;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'cate_id',
        'name',
        'description',
        'price',
        'in_stock',
        'is_new',
        'rating',
        'thumbnail',
    ];

    // belongsTo: User / ProductCate
    // hasMany: ProductReview
    // belongsToMany: Image
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(ProductCate::class, 'cate_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function images()
    {
        return $this->belongsToMany(Image::class, 'image_product', 'product_id', 'image_id');
    }
}
