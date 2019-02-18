<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $argola = 'An do la';

    public function store(Request $request) 
    {
        if ($request->hasFile('file')) {
            return $request->file->hashName();
        }
    }
    public function method_1() 
    {
        return $this->method_3();
    }
    public static function method_2()
    {
        return 'Value is returned from method 2';
    }
    public function method_3()
    {
        return 'Value is returned from method 3';
    }
}
