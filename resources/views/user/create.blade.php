
@extends('admin.adminMaster')

@section('content')
<form class='container' action="/user/create" method="Post">
  {!! csrf_field() !!}
  <div class="form-group">
  	<h3 class="mb-4">Crear Usuari</h3>

    <label for="nom" class="mb-4">Nom:</label>
    <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom') }}">
     @if($errors->has('non'))
    	<div style='height: 50px;' class="alert alert-danger"> 
    		<p>Introdueix un nom valid</p>
    	</div>
    @endif
    <label for="pass" class="mb-4">Contrasenya:</label>
    <input type="password" class="form-control" name="pass" id="pass" value="{{ old('pass') }}">
     @if($errors->has('pass'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix una Contrasenya valida</p>
      </div>
    @endif

    <br>

    <label for="email" class="mb-4">Correu:</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
     @if($errors->has('email'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix un correu valid</p>
      </div>
    @endif

    <br>

    <label class="mb-4" for="rol">rol: </label>
    <select name="rol" id="rol">
      <option value="admin"> admin</option> 
      <option value="superAdmin" > superAdmin</option>    
    </select>

  </div>
  <button type="submit" class="btn btn-primary">guardar</button>
  <a href="/user" class="btn btn-danger ml-4">cancela</a>
</form>
@endsection
