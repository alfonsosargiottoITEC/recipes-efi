@extends('layouts.app')


@section('content')
    



<h1>Create recipe</h1>

{{-- <form action="/recipes" method="post"> --}}
  
  {{-- @csrf --}}
  
  {!! Form::open(['method'=>'POST', 'action'=>'RecipeController@store']) !!}


  <div class="form-group">

    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}

    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}

    {!! Form::label('category_id', 'Category') !!}
    {!! Form::text('category_id', null, ['class'=>'form-control']) !!}

    {{-- {!! Form::label('user_id', 'User') !!}
    {!! Form::text('user_id', null, ['class'=>'form-control']) !!} --}}
    
    {!! Form::hidden('user_id', $user->id) !!}
    
  </div>

    {!! Form::submit('Crear receta', ['class'=>'btn btn-primary']) !!}
  

  {{-- <input type="text" name="name" placeholder="Nombre de la receta"> 

  <input type="text" name="description"placeholder='Descripción'>

  <input type="text" name="category_id" placeholder="category">

  <input type="text" name="user_id" placeholder="usuario">

  <input type="submit" name='submit'> --}}

    {!! Form::close() !!}

    @if (count($errors) > 0)

    <div class="alert alert-danger">

      <ul>

        @foreach ($errors->all() as $error)

        <li>
          {{$error}}
        </li>
            
        @endforeach


      </ul>


    </div>
        
    @endif



{{-- </form> --}}
















@endsection


