<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuReview extends Model
{
    protected $fillable = [
        'menu_id', 
        'user_id', 
        'rating', 
        'content'
    ];

    // belongsTo:: Menu - User
    /**
     * Undocumented function
     *
     * @return void
     */
    public function menu()
    {
        $this->belongsTo(Menu::class, 'menu_id');
    }
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
