<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Menu;
use MenuTypeCate;

class MenuType extends Model
{
    protected $fillable = ['name', 'cate_id'];

    // hasMany: Menu
    // belongsTo: MenuTypeCate

    public function menus()
    {
        $this->hasMany(Menu::class, 'type_id');
    }

    public function cate()
    {
        $this->belongsTo(MenuTypeCate::class, 'cate_id');
    }
}
