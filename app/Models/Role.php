<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use User;

class Role extends Model
{
    protected $fillable = ['role'];
    
    // hasMany: User
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
