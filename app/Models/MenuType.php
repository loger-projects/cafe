<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    protected $fillable = ['name', 'cate_id'];

    // hasMany: Menu

    public function menus()
    {
        $this->hasMany(Menu::class, 'type_id');
    }
}
