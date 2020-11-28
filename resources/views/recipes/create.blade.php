@extends('layouts.app')


@section('content')
    

  
  {!! Form::open(['method'=>'POST', 'action'=>'RecipeController@store']) !!}
  
  
  <div class="form-group row">
    <div class="col-md-2"></div>
    <div class="col-md-5">
      <h1>Create recipe</h1>

      {!! Form::label('name', 'Name') !!}
      {!! Form::text('name', null, ['class'=>'form-control','required'=>'required', 'maxlength'=>'40']) !!}
  
      {!! Form::label('description', 'Description') !!}
      {!! Form::textarea('description', null, ['class'=>'form-control','required'=>'required', 'maxlength'=>'490']) !!}

      {!! Form::label('photo', 'Photo link: ') !!}
      {!! Form::text('photo', null, ['class'=>'form-control','required'=>'required', 'maxlength'=>'254']) !!}

      {!! Form::label('aliment_id', 'Aliments') !!}
      {!! Form::select('aliment_id[]',[''=>'Choose aliments'] + $aliments, 1, ['class'=>'multiple-aliments form-control','multiple'=>"multiple", 'required'=>'required']) !!}

      {!! Form::label('category_id', 'Category') !!}
      <select name="category_id" id="category_id" class='filter-category form-control'>
        @foreach($categories as $category )
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>

      {!! Form::label('tag_id', 'Tags') !!}
      {!! Form::select('tag_id[]',[''=>'Choose tags'] + $tags, 1, ['class'=>'multiple-tags form-control','multiple'=>"multiple", 'required'=>'required']) !!}
  
  
      
      
      {!! Form::hidden('user_id', $user->id) !!}
      
      {!! Form::submit('Crear receta', ['class'=>'btn btn-primary']) !!}
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
          {{-- @if (count($aliments) > 0)  --}}
            @foreach ($aliments  as $aliment)
            <tr>
            <td>{{$aliment}}</td>
              <td></td>
              <td></td>
            </tr>      
            @endforeach
          {{-- @endif   --}}
    
        </tbody>
      </table>
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

@endsection


