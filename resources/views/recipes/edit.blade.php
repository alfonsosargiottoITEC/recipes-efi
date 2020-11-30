@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
  <div class="col-md-5">
    
  </div>
</div>


<div class="row justify-content-center">
  <div class="col-md-2"></div>
  

  <div class="col-md-5">



<h1>EDIT Recipe</h1>

{!! Form::model($recipe, ['method'=>'PATCH', 'action'=>['RecipeController@update', $recipe->id]]) !!}

  <div class="form-group">

    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control','required'=>'required', 'maxlength'=>'40']) !!}

    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control','required'=>'required', 'maxlength'=>'490']) !!}

    {!! Form::label('photo', 'Photo link: ') !!}
    {!! Form::text('photo', null, ['class'=>'form-control','required'=>'required', 'maxlength'=>'254']) !!}

    
    {!! Form::label('aliment_id', 'Aliments') !!}
    {!! Form::select('aliment_id[]',[''=>'Choose aliments'] + $aliments, $recipe->aliments, ['class'=>'multiple-aliments form-control','multiple'=>"multiple", 'required'=>'required']) !!} 

    {!! Form::label('category_id', 'Category') !!}

    {!! Form::select('category_id',[''=>$recipe->category->name] + $categories, $recipe->category->id, ['class'=>'form-control','required'=>'required']) !!}

    {!! Form::label('tag_id', 'Tags') !!}
    {!! Form::select('tag_id[]',[''=>'Choose tags'] + $tags,$recipe->tags, ['class'=>'multiple-tags form-control','multiple'=>"multiple", 'required'=>'required']) !!}

    {!! Form::hidden('user_id', $user->id) !!}
    
  </div>

  
  
  <div class="row">
    <div class="col-md-10">
      
      {!! Form::submit('Guardar cambios', ['class'=>'btn btn-success']) !!}    
      {!! Form::close() !!}
  </div>
  <div class="col-md-2">
    
    {!! Form::open(['method'=>'DELETE', 'action'=>['RecipeController@destroy', $recipe->id]]) !!}
    {!! Form::submit('Eliminar receta', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
  </div>


</div>





{!! Form::close() !!}

</div>

<div class="col-md-5">

    <H3>LIST OF ALIMENTS</H3>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col" >Name</th>
          <th scope="col" >Unit type</th>
          <th scope="col" >Quantity</th>
          <th><a href="#" onclick="return addRow();" class='btn btn-info'>+</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($recipe->aliments as $aliment )
        <tr>
          <td><select name='aliment_id[]'  class='filter-aliment form-control',style='width:200px;' required>
            
                <option class='aliment_id' value='{{$aliment->id}}'>{{ $aliment->name }}</option>
            
           </select></td>
           <td><select name='unit[]'  class='filter-unit form-control',style='width:150px;' required>
              @foreach($units as $unit )
                <option  value='{{ $unit }}'>{{ $unit }}</option>
              @endforeach
           </select></td>
           <td><input type='number' name='quantity[]' class='form-control',style='width:150px;' required></td>
           <td><a href='#'  class='btn btn-danger removeRow'>-</a></td>

           </tr>
           @endforeach
  
      </tbody>
    </table>

</div>

</div>

@endsection

@push('scripts')

<script>

  var aliment_id = [];

  
  
  function addRow(){
  
    var tr = "<tr>" +
           "<td>"+
            "<select name='aliment_id[]'  class='filter-aliment form-control',style='width:200px;' required>"+
            "@foreach($aliments as $aliment )"+
            "<option class='aliment_id' value='{{$aliment}}'>{{ $aliment }}</option>"+
            "@endforeach"+
            "</select>"+            
            "</td>"+
            "<td>"+
              "<select name='unit[]'  class='filter-unit form-control',style='width:150px;' required>"+
              "@foreach($units as $unit )"+
            "<option  value='{{ $unit }}'>{{ $unit }}</option>"+
            "@endforeach"+
            "</select>"+
            "</td>"+
            "<td>"+
              "<input type='number' name='quantity[]' class='form-control',style='width:150px;' required></td>"+            
            "<td><a href='#'  class='btn btn-danger removeRow'>-</a></td>"+

            "</tr>";

 
  $('tbody').append(tr);
  $('tbody').on('click', '.removeRow', function(){
    $(this).parent().parent().remove();
  });

  $('.filter-aliment').select2();
  $('.filter-unit').select2();


  
  }
  
</script>
    
@endpush
