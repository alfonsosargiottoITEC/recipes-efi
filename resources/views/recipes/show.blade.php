@extends('layouts.app')

@section('content')
    





<div class="card md-5 ml-4 mb-md-5 pb-md-5 mt-5" style="width: 44rem;height: 55rem;">
  <h1><a href="{{route('recipes.edit', $recipe->id)}}">{{$recipe->name}}</a></h1>
  <a href="{{route('recipes.edit', $recipe->id)}}"><img class="card-img-top img-fluid" src="{{$recipe->photo}}" alt="Card image cap"></a>
    <div class="card-body">
      <h5 class="card-title">{{$recipe->name}}</h5>
      <p class="card-text">{{$recipe->description}}.</p>
    <p class="card-text"><small class="text-muted">Rating: {{$recipe->rating}}</small></p>
    <p class="card-text"><small class="text-muted">Category: {{$recipe->category->name}}</small></p>
    <p class="card-text"><small class="text-muted">Created by: {{$recipe->user->name}}</small></p>
    

    

    @if (count($aliments) > 0) 
      <ul>
        @foreach ($aliments  as $aliment)
        <li>
          {{$aliment}}
        </li>            
        @endforeach
      </ul>
    @endif
    </div>
  </div>




@endsection