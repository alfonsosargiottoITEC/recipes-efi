@extends('layouts.app')

@section('content')
    


  <ul>

    @foreach ($aliments as $aliment)


      <li><a href="{{route('aliments.show',$aliment->id)}}">{{$aliment->name}}</a></li>


        
    @endforeach



  </ul>





@endsection

