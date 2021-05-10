@extends('admin.adminMaster')

@section('content')
<form class='container' action="/curs/create" method="Post">
  {!! csrf_field() !!}
  <div class="form-group">
  	<h3>Crear Curs</h3>
    <label for="curs">Curs</label>
    <input type="text" class="form-control" name="curs" id="curs">
     @if($errors->any())
    	<div style='height: 50px;' class="alert alert-danger"> 
    		<p>Introdueix un curs valid</p>
    	</div>
    @endif
    <br>
    <label class="mb-4" for="estat">Estat: </label>
    <select name="estat" id="estat">
      <option>Actiu</option>
      <option>Inactiu</option>       
    </select>	
  </div>
  <button type="submit" class="btn btn-primary">guardar</button>
  <a href="/curs" class="btn btn-danger ml-4">cancela</a>
</form>
@endsection
