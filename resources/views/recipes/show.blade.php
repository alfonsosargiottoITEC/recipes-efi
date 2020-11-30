@extends('layouts.app')

@section('content')
    



<div class="row">

  <div class="col-md-2">
    </div>

<div class="col-md-6">





  
<div class="card md-5 ml-4 mb-md-5 pb-md-5 mt-5" style="width: 44rem;height: 55rem;">
  <a href="{{route('recipes.edit', $recipe->id)}}"><img class="card-img-top img-fluid" src="{{$recipe->photo}}" alt="Card image cap"></a>
    <div class="card-body">
      <h5 class="card-title">{{$recipe->name}}
        <example-component
          :recipe={{ $recipe->id }}
          :favorited={{ $recipe->favorited() ? 'true' : 'false' }}>
        </example-component>
      </h5>
      <p class="card-text">{{$recipe->description}}.</p>
    <p class="card-text"><small class="text-muted">Favs: {{$favorites}}</small></p>
    <p class="card-text"><small class="text-muted">Category: {{$recipe->category->name}}</small></p>
    <p class="card-text"><small class="text-muted">Created by: {{$recipe->user->name}}</small></p>
    <p class="card-text"><small class="text-muted">Total visits: {{$total_visits}}</small></p>
    <p class="card-text"><small class="text-muted">Tags:
      @if (count($tags) > 0) 
      
        @foreach ($tags  as $tag)
        
          #{{$tag}}
      
        @endforeach
      
    @endif      
       </small></p>

      
    
    
    

    

   
    </div>
  </div>

</div>



<div class="col-md-4">

  <H3>LISTADO DE ALIMENTOS</H3>
  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Unidad</th>
        <th scope="col">Cantidad</th>
      </tr>
    </thead>
    <tbody>
      @if (count($aliments) > 0) 
        @foreach ($aliments  as $aliment)
        <tr>
          <td>{{$aliment['name']}}</td>
          <td>{{$aliment['pivot']['unit']}}</td>
          <td>{{$aliment['pivot']['quantity']}}</td>
        </tr>      
        @endforeach
      @endif  

    </tbody>
  </table>

  

</div>


</div>

@endsection