@extends('admin.adminMaster')

@section('content')

<form class='container' action="/categoria/create" method="Post">
  {!! csrf_field() !!}
  <div class="form-group">
  	<h3>Crear Categoria</h3>
    <label for="categoria">Categoria</label>
    <input type="text" class="form-control" name="categoria" id="categoria">
     @if($errors->has('categoria'))
    	<div style='height: 50px;' class="alert alert-danger"> 
    		<p>Introdueix una categoria valida </p>
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
  <a href="/categoria" class="btn btn-danger ml-4">cancela</a>
</form>
    
@endsection
