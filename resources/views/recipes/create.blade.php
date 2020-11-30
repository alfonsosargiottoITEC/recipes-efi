@extends('layouts.app')


@section('content')
    

  
  {!! Form::open(['method'=>'POST', 'action'=>'RecipeController@store', 'id'=>'input-form']) !!}
  
  
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

      {{-- {!! Form::label('aliment_id', 'Aliments') !!}
      {!! Form::select('aliment_id[]',[''=>'Choose aliments'] + $aliments, 1, ['class'=>'multiple-aliments form-control','multiple'=>"multiple", 'required'=>'required']) !!} --}}

      {!! Form::label('category_id', 'Category') !!}
      <select name="category_id" id="category_id" class='filter-category form-control'>
        @foreach($categories as $category )
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>

      {!! Form::label('tag_id', 'Tags') !!}
      {!! Form::select('tag_id[]',[''=>'Choose tags'] + $tags, 2, ['class'=>'multiple-tags form-control','multiple'=>"multiple", 'required'=>'required']) !!}
  
  
      
      
      {!! Form::hidden('user_id', $user->id) !!}
      
      {!! Form::submit('Crear receta', ['class'=>'btn btn-primary']) !!}
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

@push('scripts')

<script>

  var aliment_id = [];

  
  
  function addRow(){
  
    var tr = "<tr>" +
           "<td>"+
            "<select name='aliment_id[]'  class='filter-aliment form-control',style='width:200px;' required>"+
            "@foreach($aliments as $aliment )"+
            "<option class='aliment_id' value='{{$aliment->id}}'>{{ $aliment->name }}</option>"+
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

