@extends('layouts.app')

@section('content')
    

<a href="{{route('recipes.create')}}" class="btn btn-warning">NUEVA receta</a>
<div class="row">
    @foreach ($recipes as $recipe)


      {{-- <li><a href="{{route('recipes.show',$recipe->id)}}">{{$recipe->name}}</a></li> --}}

      
        <div class="col-md-6">

       

      <div class="card md-5 ml-4 mb-md-5 pb-md-5 mt-5" style="width: 44rem;height: 35rem;">
        
        <div class="embed-responsive embed-responsive-16by9">
          <img class="card-img-top embed-responsive-item" src="https://img-global.cpcdn.com/recipes/188f30eb05239cef/1200x630cq70/photo.jpg" alt="Card image cap">
        </div>
      
        
        <div class="card-body pt-50">
          <h5 class="card-title">{{$recipe->name}}</h5>
          <p class="card-text">{{$recipe->description}}.</p>
        <p class="card-text"><small class="text-muted">Rating: {{$recipe->rating}}</small></p>
          <a href="{{route('recipes.show',$recipe->id)}}" class="btn btn-primary">Ver receta</a>
        </div>
      </div>


    </div>
  
      
        
    @endforeach
  </div>


  





@endsection

