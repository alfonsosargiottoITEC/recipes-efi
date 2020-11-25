<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecipeRequest;
use Illuminate\Http\Request;
use App\Recipe;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Aliment;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->only('create','edit','show');
    }

    public function index()
    {


        $recipes = Recipe::all();
        $categories = Category::all();

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();

        $categories = Category::all();

        $aliments = Aliment::pluck('name','id')->all();


        return view('recipes.create', compact('user','categories','aliments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRecipeRequest $request)
    {
        
        // return $request->all();

        // $this->validate($request,[

        //     'name'=>'required|max:20',
        //     'description'=>'required|max:200',
        //     'category_id'=>'required',
        //     'user_id'=>'required'

        // ]);
        
        
        ////////////// MANY TO MANY, into PIVOT TABLE

        $recipe = Recipe::create($request->all());
        $aliments_id =  $request->get('aliment_id',[]);
        $recipe->aliments()->attach($aliments_id);
        

        // $recipe->aliments()->attach(
        //     $aliments->random(rand(1, 9))->pluck('id')->toArray()
        // ); 
        


       


        return redirect('/recipes');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $recipe = Recipe::findOrFail($id);

        $aliments = [];

        $aliments = $recipe->aliments->pluck('name','id')->toArray();

        return view('recipes.show', compact('recipe','aliments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);

        $this->authorize('edit', $recipe);

        $user = Auth::user();

        $categories = Category::pluck('name','id')->all();

        $aliments = Aliment::pluck('name','id')->all();

        return view('recipes.edit', compact('recipe','user','aliments','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $recipe = Recipe::findOrFail($id);

        $this->authorize('update', $recipe);

        $recipe->update($request->all());



        return redirect('/recipes');


        // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);

        $this->authorize('delete', $recipe);

        $recipe->delete();

        return redirect('/recipes');
    }
}
