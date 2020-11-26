@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <H2>MIS RECETAS</H2>
      <a href="{{route('recipes.create')}}" class="btn btn-warning">NUEVA receta</a>
    </div>
</div>




    @foreach ($recipes as $recipe)
    @if ($recipe->user->id === $UserId)

      <div class="col-md-6">

      

        <div class="card md-5 ml-4 mb-md-5 pb-md-5 mt-5" style="width: 44rem;height: 35rem;">
          
          <div class="embed-responsive embed-responsive-16by9">
            <a href="{{route('recipes.show',$recipe->id)}}"><img class="card-img-top embed-responsive-item" src="{{$recipe->photo}}" alt="Card image cap"></a>
          </div>
        
          
          <div class="card-body pt-50">
            <a href="{{route('recipes.show',$recipe->id)}}"><h5 class="card-title">{{$recipe->name}}</h5></a>
            <p class="card-text">{{Str::limit($recipe->description,'70', '...')}}</p>
            
    
            <div class="card-footer text-muted">
    
                <p class="card-text"> Votes: {{$recipe->rating}}</p>
                <p>Created on {{$recipe->created_at->diffForHumans()}}</p> 
    
    
            </div>
            <a href="{{route('recipes.show',$recipe->id)}}" class="btn btn-primary">Ver receta</a>
          </div>
        </div>
    
    
      </div>
       

        
    @endif

    
      

    
      
  @endforeach


</div>
@endsection