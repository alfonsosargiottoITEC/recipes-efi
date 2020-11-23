@extends('layouts.app')


@section('content')


<h1>EDIT Aliment</h1>

{!! Form::model($aliment, ['method'=>'PATCH', 'action'=>['AlimentController@update', $aliment->id]]) !!}

  <div class="form-group">

    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}


    {!! Form::label('classification_id', 'Classification') !!}
    {!! Form::text('classification_id', null, ['class'=>'form-control']) !!}

    {!! Form::hidden('user_id', $user->id) !!}
    
  </div>

  {!! Form::submit('Editar alimento', ['class'=>'btn btn-primary']) !!}

{!! Form::close() !!}



{!! Form::open(['method'=>'DELETE', 'action'=>['AlimentController@destroy', $aliment->id]]) !!}


{!! Form::submit('Borrar aliment', ['class'=>'btn btn-danger']) !!}


{!! Form::close() !!}



@endsection