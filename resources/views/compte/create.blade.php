@extends('admin.adminMaster')

@section('content')

<form class='container' action="/compte/create" method="Post">
  {!! csrf_field() !!}
  <div class="form-group">
  	<h3>Crear Compte</h3>
    <label for="compte">Compte</label>
    <input type="text" class="form-control" name="compte" id="compte">
     @if($errors->has('compte'))
    	<div style='height: 50px;' class="alert alert-danger"> 
    		<p>Introdueix un compte valid </p>
    	</div>
    @endif
    <label for="fuc">Fuc</label>
    <input type="text" class="form-control" name="fuc" id="fuc">
     @if($errors->has('fuc'))
    	<div style='height: 50px;' class="alert alert-danger"> 
    		<p>Introdueix un fuc valid </p>
    	</div>
    @endif
    <label for="clau">Clau</label>
    <input type="text" class="form-control" name="clau" id="clau">
     @if($errors->has('clau'))
    	<div style='height: 50px;' class="alert alert-danger"> 
    		<p>Introdueix una clau valida </p>
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
