<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'cate_id',
        'user_id',
        'title',
        'slug',
        'url',
        'content',
        'excerpt',
        'published',
        'allow_review',
        'thumbnail'
    ];

    // belongsTo: PostCate / User
    // hasMany: PostComment

    /**
     * Undocumented function
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(PostCate::class, 'cate_id', 'id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function comments()
    {
        return $this->hasMany(PostComment::class, 'post_id');
    }
}
