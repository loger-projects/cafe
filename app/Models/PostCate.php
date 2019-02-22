<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Post;

class PostCate extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'cate_id', 'id');
    }
}
