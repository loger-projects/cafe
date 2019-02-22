<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Gallery;
use Product;
use Menu;

class Image extends Model
{
    protected $fillable = ['src', 'title', 'alt', 'size'];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function gallery()
    {
        return $this->hasOne(Gallery::class, 'image_id');
    }

    /**
     * The Products that blong to image
     *
     * @return void
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'image_product', 'image_id', 'product_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'image_menu', 'image_id', 'menu_id');
    }
}
