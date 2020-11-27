@extends('layouts.app')

@section('content')
    

<div class="row">

  <div class="col-md-2">
    </div>

<div class="col-md-6">


<h1><a href="{{route('aliments.edit', $aliment->id)}}">{{$aliment->name}}</a></h1>
  
 </div> 
</div>




@endsection