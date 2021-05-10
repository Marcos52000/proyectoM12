@extends('admin.adminMaster')

@section('content')

<form class='container' action="/pagament/create" method="Post">
  {!! csrf_field() !!}
  <div class="form-group">
  	<h3>Crear Pagament</h3>

    <label class="mb-4" for="categoria">Categoria: </label>
    <select name="categoria" id="categoria">
    @foreach ($categories  as $categoria)

      <option value="{{$categoria->id}}">{{$categoria -> categoria}}</option>  
    @endforeach 
    </select>

    <br>

    <label class="mb-4" for="compte">Compte: </label>
    <select name="compte" id="compte">
    @foreach ($comptes  as $compte)

      <option value="{{$compte ->id}}">{{$compte -> compte}}</option>  

    @endforeach 
    </select>

    <br>

    <label class="mb-4" for="nivell">Nivell: </label>
    <select name="nivell" id="nivell">
      <option>ESO</option>
      <option>BAT</option> 
      <option>CF</option> 
      <option>PR</option>   
    </select>

     <br>

    <label class="mb-4" for="curs">Curs: </label>
    <select name="curs" id="curs">
    @foreach ($cursos  as $curs)

      <option value="{{$curs->id}}">{{$curs-> curs}}</option>  

    @endforeach 
    </select>

    <br>

    <label class="mb-4 " for="titol">Titol: </label>
    <input type="text" class="form-control" name="titol" id="titol" value="{{ old('titol') }}">
     @if($errors->has('titol'))
    	<div style='height: 50px;' class="alert alert-danger"> 
    		<p>Introdueix un titol valid</p>
    	</div>
    @endif

    <br>

      <label class="mb-4 " for="desc">Descripció: </label>
    <textarea class="form-control" name="desc" id="desc">{!! old('desc') !!}</textarea>
     @if($errors->has('desc'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix una descripció valida</p>
      </div>
    @endif

    <label class="mb-4 " for="preu">Preu: </label>
    <input style="width:200px;" type="number" step='0.05' value='0.00' class="form-control" name="preu" id="preu">
     @if($errors->has('preu'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix un preu valid</p>
      </div>
    @endif

    <br>

    <label class="mb-4 " for="data_inici">Data inici: </label>
    <input style="width:200px;" type="date" class="form-control" name="data_inici" id="data_inici" value="{{ old('data_inici')}}">
     @if($errors->has('data_inici'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix una data valida</p>
      </div>
    @endif

    <br>

    <label class="mb-4 " for="data_fi">Data fi: </label>
    <input style="width:200px;" type="date" class="form-control" name="data_fi" id="data_fi" value="{{ old('data_fi') }}">
     @if($errors->has('data_fi'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix una data valida</p>
      </div>
    @endif      	

    <br>

    <label class="mb-4" for="estat">Estat: </label>
    <select name="estat" id="estat">
      <option>Actiu</option>
      <option>Inactiu</option>       
    </select>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'desc' );
    </script>

  </div>
  <button type="submit" class="btn btn-primary">guardar</button>
  <a href="/pagament" class="btn btn-danger ml-4">cancela</a>
</form>

@endsection
