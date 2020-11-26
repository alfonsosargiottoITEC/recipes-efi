@extends('layouts.app')


@section('content')
    



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
    {!! Form::select('aliment_id[]',[''=>'Choose aliments'] + $aliments, null, ['class'=>'form-control','multiple'=>"multiple"]) !!}

    {!! Form::label('category_id', 'Category') !!}

    {!! Form::select('category_id',[''=>$recipe->category->name] + $categories, $recipe->category->id, ['class'=>'form-control','required'=>'required']) !!}

    {!! Form::hidden('user_id', $user->id) !!}
    
  </div>

  {!! Form::submit('Editar receta', ['class'=>'btn btn-primary']) !!}

{!! Form::close() !!}

{{-- <form action="/recipes/{{$recipe->id}}" method="post">
  
  @csrf


  <input type="hidden" name="_method" value="PUT">
  <input type="text" name="name" placeholder="Nombre de la receta" value="{{$recipe->name}}">
  <input type="text" name="description"placeholder='Descripción' value="{{$recipe->description}}">
  <input type="text" name="category_id" placeholder="category" value="{{$recipe->category_id}}">
  

  <input type="submit" name='submit' value="UPDATE">




</form> --}}

{!! Form::open(['method'=>'DELETE', 'action'=>['RecipeController@destroy', $recipe->id]]) !!}


{!! Form::submit('Borrar receta', ['class'=>'btn btn-danger']) !!}


{!! Form::close() !!}




{{-- <form action="/recipes/{{$recipe->id}}" method="post">
  @csrf

  <input type="hidden" name="_method" value="DELETE">


  <input type="submit" value="DELETE">



</form>
 --}}












@endsection