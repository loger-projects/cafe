<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'cate_id',
        'name',
        'slug',
        'url',
        'description',
        'price',
        'in_stock',
        'is_new',
        'rating',
        'quantity',
        'available_quantity',
        'sold_quantity',
        'thumbnail',
    ];

    // belongsTo: ProductCate
    // hasMany: ProductReview
    // belongsToMany: User / Image
    
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

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user', 'product_id', 'user_id');
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
