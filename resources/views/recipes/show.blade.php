@extends('layouts.app')

@section('content')
    


<h1><a href="{{route('recipes.edit', $recipe->id)}}">{{$recipe->name}}</a></h1>
  





@endsection