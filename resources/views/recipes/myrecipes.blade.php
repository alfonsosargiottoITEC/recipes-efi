@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <H2>MIS RECETAS</H2>
      <a href="{{route('recipes.create')}}" class="btn btn-info"><b>Nueva receta</b><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-egg-fried" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M13.665 6.113a1 1 0 0 1-.667-.977L13 5a4 4 0 0 0-6.483-3.136 1 1 0 0 1-.8.2 4 4 0 0 0-3.693 6.61 1 1 0 0 1 .2 1 4 4 0 0 0 6.67 4.087 1 1 0 0 1 1.262-.152 2.5 2.5 0 0 0 3.715-2.905 1 1 0 0 1 .341-1.113 2.001 2.001 0 0 0-.547-3.478zM14 5c0 .057 0 .113-.003.17a3.001 3.001 0 0 1 .822 5.216 3.5 3.5 0 0 1-5.201 4.065 5 5 0 0 1-8.336-5.109A5 5 0 0 1 5.896 1.08 5 5 0 0 1 14 5z"/>
        <circle cx="8" cy="8" r="3"/></svg></a>
    </div>
  </div>



<div class="row justify-content-center">
    @foreach ($recipes as $recipe)
    @if ($recipe->user->id === $UserId)

    <div class="col-md-7">

     

      <div class="card md-5 ml-4 mb-md-5 border-dark mb-3 mt-5" style="width: 44rem;height: 40rem;">
        
        <div class="embed-responsive embed-responsive-16by9">
          <a href="{{route('recipes.show',$recipe->id)}}"><img class="card-img-top embed-responsive-item" src="{{$recipe->photo}}" alt="Card image cap"></a>
        </div>
      
        
        <div class="card-body pt-50">
          <h5 class="card-title">{{$recipe->name}}</h5>
          <p class="card-text">{{Str::limit($recipe->description,'70', '...')}}</p>
          
  
          <div class="card-footer text-muted">
  
              <p class="card-text"> Votes: {{$recipe->rating}}</p>
              <p>Created by: {{$recipe->user->name}}</p> 
              <p>Created on {{$recipe->created_at->diffForHumans()}}</p> 
  
  
          </div>
        </div>
      </div>
  
  
    </div>
       

        
    @endif

    
      

    
      
  @endforeach
</div>

</div>
@endsection
