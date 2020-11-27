@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
  <div class="col-md-5">
    
  </div>
</div>


<div class="row justify-content-center">

  <div class="col-md-7">



<h1>EDIT Recipe</h1>

{!! Form::model($recipe, ['method'=>'PATCH', 'action'=>['RecipeController@update', $recipe->id]]) !!}

  <div class="form-group">

    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control','required'=>'required', 'maxlength'=>'40']) !!}

    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control','required'=>'required', 'maxlength'=>'490']) !!}

    {!! Form::label('photo', 'Photo link: ') !!}
    {!! Form::text('photo', null, ['class'=>'form-control','required'=>'required', 'maxlength'=>'254']) !!}

    {!! Form::label('aliment_id', 'Aliments') !!}
    {!! Form::select('aliment_id[]',[''=>'Choose aliments'] + $aliments, $recipe->aliments, ['class'=>'form-control','multiple'=>"multiple"]) !!}

    {!! Form::label('category_id', 'Category') !!}

    {!! Form::select('category_id',[''=>$recipe->category->name] + $categories, $recipe->category->id, ['class'=>'form-control','required'=>'required']) !!}

    {!! Form::hidden('user_id', $user->id) !!}
    
  </div>

  
  
  <div class="row">
    <div class="col-md-10">
      
      {!! Form::submit('Guardar cambios', ['class'=>'btn btn-success']) !!}    
      {!! Form::close() !!}
  </div>
  <div class="col-md-2">
    
    {!! Form::open(['method'=>'DELETE', 'action'=>['RecipeController@destroy', $recipe->id]]) !!}
    {!! Form::submit('Eliminar receta', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
  </div>


</div>





{!! Form::close() !!}

</div>
</div>















@endsection