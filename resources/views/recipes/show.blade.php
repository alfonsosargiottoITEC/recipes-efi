@extends('layouts.app')

@section('content')
    


<h1><a href="{{route('recipes.edit', $recipe->id)}}">{{$recipe->name}}</a></h1>
  


  <div class="card" style="width: 58rem;height: 25rem;">
    <img class="card-img-top" src="..." alt="Card image cap">   
    <div class="card-body">
      <h5 class="card-title">{{$recipe->name}}</h5>
      <p class="card-text">{{$recipe->description}}.</p>
    <p class="card-text"><small class="text-muted">Rating: {{$recipe->rating}}</small></p>
    <p class="card-text"><small class="text-muted">Category: {{$recipe->category_id}}</small></p>

    </div>
  </div>




@endsection