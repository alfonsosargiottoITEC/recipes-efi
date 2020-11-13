<?php

use Illuminate\Support\Facades\Route;
use App\Aliment;
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



Route::get('aliment/{id}/{category}', 'AlimentController@show_aliment');



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

Route::get('/read', function(){

    $aliments = Aliment::all();

    foreach($aliments as $aliment){
        return $aliment->name;
    }

});

Route::get('/find', function(){

    $aliments = Aliment::find(1);

    return $aliments->name;
    // foreach($aliments as $aliment){
    //     return $aliment->name;
    // }

});