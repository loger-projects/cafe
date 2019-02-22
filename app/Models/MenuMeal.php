<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Menu;

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
