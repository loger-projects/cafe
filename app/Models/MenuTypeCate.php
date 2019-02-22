<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MenuType;

class MenuTypeCate extends Model
{
    protected $fillable = ['name'];
    
    // hasMany: MenuType

    /**
     * Undocumented function
     *
     * @return void
     */
    public function types()
    {
        return $this->hasMany(MenyType::class,'cate_id','id');
    }
}
