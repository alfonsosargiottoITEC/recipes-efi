<?php

use Illuminate\Support\Facades\Route;
use App\Aliment;
use App\Classification;
use App\Recipe;
use App\Category;
use App\User;
use App\Role;
use App\Favorite;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');


    if(Auth::attempt(['email' => $email, 'password' => $password])){

        return redirect()-> intended();
        
    }



});


/*
|--------------------------------------------------------------------------
| ELOQUENT 
|--------------------------------------------------------------------------
|
| 
| 
| 
|
*/

///////////////// accesing to pivote table/ tabla hija

Route::get('/recipe/pivot', function () {
    
    $recipe = Recipe::find(2);

    foreach($recipe->aliments as $aliment){
        
        echo $aliment->pivot->created_at;
    }
});





/*
|--------------------------------------------------------------------------
|CRUD Application
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => ['IsAdmin']], function () {
    
    Route::resource('/aliments', 'AlimentController');

});


Route::group(['middleware' => 'web'], function () {

    
    Route::resource('/users', 'UserController');
    
    Route::resource('/recipes', 'RecipeController');

    

    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){


        return view('admin.index');

});

Route::get('/myrecipes',['middleware'=>['auth'], 'uses'=>'RecipeController@myrecipes'], function () {

    // $this->middleware('auth')->only('create','edit','show');

    

    $recipes = Recipe::all();
    $categories = Category::all();

    return view('recipes.myrecipes',compact('recipes','categories'));
    
});

Route::get('select2', 'RecipeController@index');
Route::get('/select2-autocomplete-ajax', 'RecipeController@dataAjax');

Route::get("addmore","RecipeController@addMore");

Route::post("addmore","RecipeController@addMorePost")->name('addmorePost');

Route::post('recipes/insert2', 'RecipeController@insert2')->name('recipes.insert2');

Route::post('/favorite/{recipe}', 'RecipeController@favoriteRecipe')->middleware('auth');
Route::post('/unfavorite/{recipe}', 'RecipeController@unFavoriteRecipe')->middleware('auth');

Route::get('my_favorites', 'UserController@myFavorites')->middleware('auth');

// Route::get('/admin/user/roles',['middleware'=>['role'], 'uses'=>'HomeController@index'], function () {


//     $user = Auth::user();

//     if($user->isAdmin()){

//         return 'usando middleware, es admin';

        
//     }


    
// });