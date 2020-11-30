@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
          
        </div>
    </div>


    <div class="row justify-content-center">

    @foreach ($recipes as $recipe)

    
      <div class="col-md-7">

     

    <div class="card md-5 ml-4 mb-md-5  mt-5 border-dark mb-3" style="width: 44rem;height: 40rem;">
      
      <div class="embed-responsive embed-responsive-16by9">
        <a href="{{route('recipes.show',$recipe->id)}}"><img class="card-img-top embed-responsive-item" src="{{$recipe->photo}}" alt="Card image cap"></a>
      </div>
    
      
      <div class="card-body pt-50">
        <h5 class="card-title">{{$recipe->name}}
          <example-component
            :recipe={{ $recipe->id }}
            :favorited={{ $recipe->favorited() ? 'true' : 'false' }}>
          </example-component>
        </h5>
        <p class="card-text">{{Str::limit($recipe->description,'70', '...')}}</p>
        

        <div class="card-footer text-muted">

            
            <p>Created by: {{$recipe->user->name}}</p> 
            <p>Created on {{$recipe->created_at->diffForHumans()}}</p> 


        </div>
      </div>
    </div>


  </div>

    
      
  @endforeach
</div>

</div>
@endsection


