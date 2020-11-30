<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlimentRequest;
use Illuminate\Http\Request;
use App\Aliment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Classification;

class AlimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $aliments = Aliment::all();


        return view('aliments.index', compact('aliments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $classifications = Classification::all();

     

        return view('aliments.create', compact('user','classifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAlimentRequest $request)
    {
        Aliment::create($request->all());
        
        $user = Auth::user();
        
        Log::info('User created an aliment.', ['User ID: ' => $user->id, 'Aliment name:'=>$request->name]);

        return redirect('/aliments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aliment = Aliment::findOrFail($id);

        return view('aliments.show', compact('aliment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aliment = Aliment::findOrFail($id);
        $user = Auth::user();
        $classifications = Classification::pluck('name','id')->all();

        return view('aliments.edit', compact('aliment','user','classifications'));
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
        $aliment = Aliment::findOrFail($id);

        $aliment->update($request->all());

        return redirect('/aliments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aliment = Aliment::findOrFail($id);

        $aliment->delete();

        return redirect('/aliments');
    }
}
