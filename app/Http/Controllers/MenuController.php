<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuMeal;
use App\Models\MenuIngredient;
use Illuminate\Http\Request;
use Route;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function getMeal($meal)
    {
        // get all food of breakfast => get all food type => get all food from food type
        $meal = MenuMeal::where('name', $meal)->first();
        $food = [];
        $drink = [];
        foreach ($meal->menus as $menu) {
            if ($menu->type->is_food) {
                if (isset($food[$menu->type->name])) {
                    $food[$menu->type->name]['menu'][] = $menu;
                } else {
                    $food[$menu->type->name] = [];
                    $food[$menu->type->name]['name'] = $menu->type->name;
                    $food[$menu->type->name]['menu'] = [];
                    $food[$menu->type->name]['menu'][] = $menu;
                }
            } else {
                if (isset($drink[$menu->type->name])) {
                    $drink[$menu->type->name]['menu'][] = $menu;
                } else {
                    $drink[$menu->type->name] = [];
                    $drink[$menu->type->name]['name'] = $menu->type->name;
                    $drink[$menu->type->name]['menu'] = [];
                    $drink[$menu->type->name]['menu'][] = $menu;
                }
            }
        }
        return ['food' => $food, 'drink' => $drink];
    }

    public function getIngredients($id)
    {
        $ingredients = Menu::where('id', $id)->first()->ingredients;
        $array = [];
        foreach ($ingredients as $ingredient) {
            $array[] = $ingredient;
        }
        return $array;
    }

    public static function routes()
    {
        Route::get('/menu', 'MenuController@index')->name('menu.index'); // view list menu
        Route::get('/{id}/menu/create', 'MenuController@create')->name('menu.create'); // return create page view
        Route::post('/{id}/menu/store', 'MenuController@store')->name('menu.store'); // create new menu
        Route::get('/{name}/menu/show', 'MenuController@show')->name('menu.show'); // view specific menu
        Route::get('/{id}/menu/edit', 'MenuController@edit')->name('menu.edit');
        Route::put('/{id}/menu', 'MenuController@update')->name('menu.update');
        Route::delete('/{id}/menu', 'MenuController@destroy')->name('menu.destroy');
        
        Route::get('/{id}/menu/get/ingredients', 'MenuController@getIngredients')->name('menu.get.ingredients');
        Route::get('/menu/get/{meal}/meal', 'menuController@getMeal')->name('menu.get.meal');
    }
}
