<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


    </head>
    <body>
      <div class="container">
        

      {{-- <h1>Aliment id {{$id}} </h1>
      <h2>Aliment category {{$category}} </h2> --}}

        <h2>Lista de alimentos</h2>
        @if (count($aliments))

        <ul>
          @foreach ($aliments as $aliment)

          <li>{{$aliment}}</li>

          
          @endforeach
          
          @endif
        </ul>


      </div>
    </body>
</html>
