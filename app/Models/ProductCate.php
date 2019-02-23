<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCate extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'cate_id');
    }
}
