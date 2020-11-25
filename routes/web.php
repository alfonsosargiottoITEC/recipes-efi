<?php

use Illuminate\Support\Facades\Route;
use App\Aliment;
use App\Classification;
use App\Recipe;
use App\Category;
use App\User;
use App\Role;
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


// Route::get('/about', function () {
//     return "hi about page";
// });

// Route::get('/post/{id}', function ($id) {
//     return "this is post num ".$id;
// });


// Route::get('/admin/posts/example',array('as'=>'admin.home', function () {
//     $url = route('admin.home');
//     return "this url is  ". $url;
// }));

// Route::get('/aliment/{id}', 'AlimentController@index');

#Route::resource('aliment', 'AlimentController');



// Route::get('aliment/{id}/{category}', 'AlimentController@show_aliment');



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

// Route::get('/read', function(){

//     $aliments = Aliment::all();

//     foreach($aliments as $aliment){
//         return $aliment->name;
//     }

// });

// Route::get('/find', function(){

//     $aliments = Aliment::find(1);

//     return $aliments->name;
//     // foreach($aliments as $aliment){
//     //     return $aliment->name;
//     // }

// });

// Route::get('/findmore', function(){

//     // $aliments = Aliment::findOrFail(1);
//     $aliments = Aliment::where("id",1)->orderBy('id', 'desc')->take(1)->get();

//     return $aliments;
//     // foreach($aliments as $aliment){
//     //     return $aliment->name;
//     // }

// });

// Route::get('/alimentinsert', function(){
    
//     $aliment = new Aliment;

//     $aliment->name = 'Conejo';
//     $aliment->classification = 1;
//     $aliment->save();
// });


// Route::get('/alimentupdate', function(){
    
//     $aliment = Aliment::find(2);

//     $aliment->name = 'Lechuga';
//     $aliment->classification = 2;
//     $aliment->save();
// });


// Route::get("/create", function(){


//     Aliment::create(['name'=>'Lechuga', 'classification'=>'2']);
// });

// Route::get('/update', function (){


//     Aliment::where('id',2)->where('classification', 2)->update(['name'=>'editado']);


// });

// Route::get('/delete', function (){


//     $aliment = Aliment::find(2);
//     $aliment->delete();

    // OR destroy:
    // Aliment::destroy (3);
    // Aliment::destroy ([2,3]);
    // Aliment::where('classification',1)->delete();

// });

// Route::get('classification/{id}/aliment', function($id){

//     // $classification = classification::find(1);

//     return Classification::find($id)->aliment;

    

// });


// Route::get('alimento/{id}/classification', function($id){

//     // $classification = classification::find(1);

//     return Aliment::find($id)->classification->name;

    

// });


// Route::get('classifications', function(){

//     $classification = classification::find(1);

//     foreach($classification->aliments as $aliment){

//         echo $aliment->name . "<br>";

//     }

// });


//////////// many to many

// Route::get('/recipe/{id}/aliment', function ($id) {
    
//     $recipe = Recipe::find($id);

//     return $recipe;

//     // foreach($recipe->aliments as $aliment){
//     //     return $aliment->name;
//     // }

// });

///////////////// accesing to pivote table/ tabla hija

Route::get('/recipe/pivot', function () {
    
    $recipe = Recipe::find(2);

    foreach($recipe->aliments as $aliment){
        
        echo $aliment->pivot->created_at;
    }
});

// Route::get('/recipe/category', function () {

//     $category = Category::find(5);

//     foreach ($category->aliments as $aliment) {

//         return $aliment->name;
//     }

    
// });

/////////////// one to many user-recipes

// Route::get('/create', function () {
    
//     $user = User::findOrFail(1);

//     $recipe = new Recipe(['name'=>'Receta primera', 'description'=>'Probando cargar', 'category_id'=>1]);
//     $user->recipes()->save($recipe);

// });

// Route::get('/read/{id}', function ($id) {

//     $user = User::findOrFail($id);
    
//     // return $user->recipes;

//     foreach($user->recipes as $recipe){
//         echo $recipe->name . '<br>';
//     };

// });


// Route::get('/update', function () {

//     $user = User::find(1);

//     $user->recipes()->where('id','=',2)->update(['name'=>'Asado de ternera']);
    
// });

// Route::get('delete', function () {

//     $user = User::find(1);

//     $user->recipes()->where('id','=',1)->delete();
    
// });


//////////////////// many to many users/ aliment_recipe/////////////////////////

// Route::get('create', function () {

//     $recipe = Recipe::findOrFail(3);

//     $aliment = new Aliment(['name'=>'Pimiento', 'classification_id'=>2]);

//     $recipe->aliments()->save($aliment);
    
// });


// Route::get('read', function () {

//     $recipe = Recipe::findOrFail(3);

//     dd($recipe->aliments);

//     // foreach($recipe->aliments as $aliment){

//     //     echo $aliment;
//     // };
    
// });

// Route::get('update', function () {

//     $recipe = Recipe::findOrFail(3);

//     if ($recipe->has('aliments')){

//         foreach($recipe->aliments as $aliment){

//             if ($aliment->name == 'Cebolla'){
//                 $aliment->name = 'Cebollita';

//                 $aliment->save();
//             }

//         };

//     };
    
// });

// Route::get('delete', function () {

//     $user = User::findorFail(2);

//     foreach($user->recipes as $recipe){
        
//         $recipe->whereId(5)->delete();

//     };

    
// });

/////////// MANY TO MANY ALIMENT-RECIPE ATTACH DETTACH Y SYNC
// Route::get('attach', function () {

//     $recipe = Recipe::findOrFail(4);

//     $recipe->aliments()->attach(7);
    
// });

// Route::get('detach', function () {

//     $recipe = Recipe::findOrFail(4);

//     $recipe->aliments()->detach(7);
    
// });

// Route::get('sync', function () {

//     $recipe = Recipe::findOrFail(4);

//     $recipe->aliments()->sync([1,2]);
    
// });


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


// Route::get('/admin/user/roles',['middleware'=>['role'], 'uses'=>'HomeController@index'], function () {


//     $user = Auth::user();

//     if($user->isAdmin()){

//         return 'usando middleware, es admin';

        
//     }


    
// });