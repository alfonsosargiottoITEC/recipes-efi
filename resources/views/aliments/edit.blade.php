@extends('layouts.app')


@section('content')

<div class="row">

  <div class="col-md-2">
    </div>

<div class="col-md-3">


<h1>EDIT Aliment</h1>

{!! Form::model($aliment, ['method'=>'PATCH', 'action'=>['AlimentController@update', $aliment->id]]) !!}

  <div class="form-group">

    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}


    {!! Form::label('classification_id', 'Classification') !!}
    {!! Form::select('classification_id',[''=>$aliment->classification->name] + $classifications, $aliment->classification->id, ['class'=>'form-control','required'=>'required']) !!}
      {{-- <select name="classification_id" id="classification_id" class='form-control'>
        @foreach($classifications as $classification )
          <option value="{{ $classification->id }}">{{ $classification->name }}</option>
        @endforeach
      </select> --}}

    {!! Form::hidden('user_id', $user->id) !!}
    
  </div>

  <div class="row">
    <div class="col-md-8">
    {!! Form::submit('Guardar cambios', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
    <div class="col-md-2">
    {!! Form::open(['method'=>'DELETE', 'action'=>['AlimentController@destroy', $aliment->id]]) !!}
    {!! Form::submit('Eliminar alimento', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
    </div>


</div>
@endsection