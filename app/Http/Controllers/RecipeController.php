<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecipeRequest;
use Illuminate\Http\Request;
use App\Recipe;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Aliment;
use App\Tag;
use Illuminate\Support\Arr;



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
        $tags = Tag::all();
        

        return view('recipes.index', compact('recipes','categories','tags'));
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

        $tags = Tag::pluck('name','id')->all();


        return view('recipes.create', compact('user','categories','aliments','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRecipeRequest $request)
    {
        
        $recipe = Recipe::create($request->all());
        $aliments_id =  $request->get('aliment_id',[]);
        $tags_id =  $request->get('tag_id',[]);
        $recipe->tags()->attach($tags_id);
        $recipe->aliments()->attach($aliments_id);
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

        

        visits($recipe)->forceIncrement();

        $total_visits = visits($recipe)->count();

        $tags = [];

        $tags = $recipe->tags->pluck('name','id')->toArray();

        $aliments = $recipe->aliments->toArray();


        return view('recipes.show', compact('recipe','aliments','total_visits','tags'));
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
        
        $aliments_id =  $request->get('aliment_id',[]);

        $recipe->update($request->all());

        $recipe->aliments()->attach($aliments_id);



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


    public function myrecipes()
    {
        $UserId = Auth::id(); 

        $recipes = Recipe::all();
        $categories = Category::all();

        return view('recipes.myrecipes', compact('recipes','UserId'));
    }

    public function dataAjax(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data =Recipe::select("id","name")
            		->where('name','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }
}
