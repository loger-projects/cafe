<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuMeal extends Model
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_meal', 'meal_id', 'menu_id');
    }
}
