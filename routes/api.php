<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\RecipeCollection;
use App\Recipe;
use App\Http\Controllers\RecipeController;
use App\Http\Resources\Recipe as RecipeResource;
use App\Http\Resources\Recipes as RecipesResource;
use App\Http\Resources\Aliment as AlimentResource;
use App\Http\Resources\Category as CategoryResource;
use App\Category;
use App\Aliment;
use App\Tag;
use Illuminate\Support\Arr;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('recipes', 'RecipeController@index', function () {

    $recipes = Recipe::all();
    
});


Route::get('/recipes', function () {

    return  RecipesResource::collection(Recipe::all());
    
});

Route::get('/recipes/{id}', function ($id) {

    

    return new RecipeResource(Recipe::find($id));
    

});

Route::get('aliments', function () {

    return new AlimentResource(Aliment::all());

    
});

Route::get('categories', function () {

    return new CategoryResource(Category::all());
    
});