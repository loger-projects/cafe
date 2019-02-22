<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Menu;

class MenuType extends Model
{
    protected $fillable = ['name'];

    // belongsTo: Menu
    public function menu()
    {
        $this->belongsTo(Menu::class, 'menu_id');
    }
}
