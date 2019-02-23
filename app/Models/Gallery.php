<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = ['image_id', 'title', 'description'];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }
}
