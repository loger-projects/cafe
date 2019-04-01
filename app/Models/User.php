<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'email',
        'name',
        'username',
        'password',
        'avatar',
        'phone',
        'address',
        'distric',
        'city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // hasMany: Post / PostComment
    // hasMany: Product / ProductReview
    // hasMany: MenuReview
    // hasMany: Order
    // belongsTo: Role

    /**
     * Undocumented function
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function postComments()
    {
        return $this->hasMany(PostComment::class);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function Products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
    }
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function MenuReviews()
    {
        return $this->hasMany(MenuReview::class);
    }
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
