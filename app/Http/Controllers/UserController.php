<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Route;

class UserController extends Controller
{
    public function apiShow($id)
    {
        return User::where('id', $id)->first();
    }

    public static function routes()
    {
        Route::group([
            'prefix' => 'api/user'
        ],function() {
            Route::name('api.user')->group(function() {
                Route::get('/show/{id}', 'UserController@apiShow')->name('.show');
            });
        });
    }
}
