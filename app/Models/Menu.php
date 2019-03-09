<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'type_id', 
        'name', 
        'description', 
        'price',
        'is_new', 
        'rating',
        'thumbnail'
    ];

    // belongsTo: MenuType
    // hasMany: MenuReview
    // belongsToMany: Image / Meal / Ingredient

    /**
     * Undocumented function
     *
     * @return void
     */
    public function type()
    {
        return $this->belongsTo(MenuType::class, 'type_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function reviews()
    {
        return $this->hasMany(MenuReview::class, 'menu_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function meals()
    {
        return $this->belongsToMany(MenuMeal::class, 'menu_meal', 'menu_id', 'meal_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function images()
    {
        return $this->belongsToMany(Image::class, 'image_menu', 'menu_id', 'image_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'menu_ingredient', 'menu_id', 'ingredient_id');
    }
}
