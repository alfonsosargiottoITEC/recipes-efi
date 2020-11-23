@extends('layouts.app')


@section('content')
    



<h1>Create aliment</h1>


  
  {!! Form::open(['method'=>'POST', 'action'=>'AlimentController@store']) !!}


  <div class="form-group">

    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}

    {!! Form::label('classification_id', 'Classification') !!}
    {!! Form::text('classification_id', null, ['class'=>'form-control']) !!}
    
    {!! Form::hidden('user_id', $user->id) !!}
    
  </div>

    {!! Form::submit('Crear alimento', ['class'=>'btn btn-primary']) !!}
  

  

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


