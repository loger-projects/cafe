<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_ingredient', 'ingredient_id', 'menu_id');
    }
}
