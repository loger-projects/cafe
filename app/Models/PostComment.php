<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Post;
use User;

class PostComment extends Model
{
    protected $fillable = ['post_id', 'user_id', 'parent_id', 'content'];

    // belongsTo: Post / User

    /**
     * Undocumented function
     *
     * @return void
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
