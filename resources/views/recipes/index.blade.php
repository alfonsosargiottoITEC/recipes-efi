@extends('layouts.app')

@section('content')
    


  <ul>

    @foreach ($recipes as $recipe)


      <li><a href="{{route('recipes.show',$recipe->id)}}">{{$recipe->name}}</a></li>


        
    @endforeach



  </ul>





@endsection

