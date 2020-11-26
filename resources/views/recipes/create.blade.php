@extends('layouts.app')


@section('content')
    




{{-- <form action="/recipes" method="post"> --}}
  
  {{-- @csrf --}}
  
  {!! Form::open(['method'=>'POST', 'action'=>'RecipeController@store']) !!}
  
  
  <div class="form-group row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h1>Create recipe</h1>

      {!! Form::label('name', 'Name') !!}
      {!! Form::text('name', null, ['class'=>'form-control','required'=>'required', 'maxlength'=>'40']) !!}
  
      {!! Form::label('description', 'Description') !!}
      {!! Form::textarea('description', null, ['class'=>'form-control','required'=>'required', 'maxlength'=>'490']) !!}

      {!! Form::label('photo', 'Photo link: ') !!}
      {!! Form::text('photo', null, ['class'=>'form-control','required'=>'required', 'maxlength'=>'254']) !!}

      {!! Form::label('aliment_id', 'Aliments') !!}
      {!! Form::select('aliment_id[]',[''=>'Choose aliments'] + $aliments, 1, ['class'=>'form-control','multiple'=>"multiple", 'required'=>'required']) !!}

      {!! Form::label('category_id', 'Category') !!}
      <select name="category_id" id="category_id" class='form-control'>
        @foreach($categories as $category )
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
  
  
      
      
      {!! Form::hidden('user_id', $user->id) !!}
      
      {!! Form::submit('Crear receta', ['class'=>'btn btn-primary']) !!}
    </div>
  

    </div>



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


