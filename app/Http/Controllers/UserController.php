<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Route;
use Auth;

class UserController extends Controller
{
    /**
     * User Home Page
     *
     * @return void
     */
    public function home()
    {
        return view('user.home');
    }

    public function apiShow($id)
    {
        return User::where('id', $id)->first();
    }

    public function apiAuthCheck()
    {
        return Auth::check() ? Auth::user() : '';
    }
    
    public function apiAuth()
    {
        return Auth::check() ? Auth::user() : false;
    }

    public static function routes()
    {
        Route::group([
            'prefix' => 'user',
            'middleware' => ['auth', 'verified']
        ],function() {
            Route::name('user.')->group(function() {
                Route::get('/home', 'UserController@home')->name('home');
            });
        });
        
        
        Route::group([
            'prefix' => 'api/user'
        ],function() {
            Route::name('api.user.')->group(function() {
                Route::get('/show/{id}', 'UserController@apiShow')->name('show');
                Route::get('/auth-check', 'UserController@apiAuthCheck')->name('authCheck');
                Route::get('/auth', 'UserController@apiAuth')->name('auth');
            });
        });
    }
}
