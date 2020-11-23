@extends('layouts.app')

@section('content')
    


<h1><a href="{{route('aliments.edit', $aliment->id)}}">{{$aliment->name}}</a></h1>
  





@endsection