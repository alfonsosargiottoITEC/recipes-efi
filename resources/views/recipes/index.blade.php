@extends('layouts.app')

@section('content')
    

<a href="{{route('recipes.create')}}" class="btn btn-warning">NUEVA receta</a>

    @foreach ($recipes as $recipe)


      {{-- <li><a href="{{route('recipes.show',$recipe->id)}}">{{$recipe->name}}</a></li> --}}

      <div class="card" style="width: 38rem;height: 15rem;">
        
        <div class="card-body">
          <h5 class="card-title">{{$recipe->name}}</h5>
          <p class="card-text">{{$recipe->description}}.</p>
        <p class="card-text"><small class="text-muted">Rating: {{$recipe->rating}}</small></p>
          <a href="{{route('recipes.show',$recipe->id)}}" class="btn btn-primary">Ver receta</a>
        </div>
      </div>
      
        
    @endforeach



  





@endsection

