@extends('admin.adminMaster')

@section('content')
<form class='container' action="/user/edit/{{$usuarios->id}}" method="Post">
  {!! csrf_field() !!}
 <div class="form-group">
    <h3 class="mb-4">Editar Usuari</h3>

    <label for="nom" class="mb-4">Nom:</label>
    <input type="text" class="form-control" name="nom" id="nom" value="{{$usuarios->user}}">
     @if($errors->has('nom'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix un nom valid</p>
      </div>
    @endif

    <br>

    <label for="email" class="mb-4">Correu:</label>
    <input type="email" class="form-control" name="email" id="email" value="{{$usuarios->email}}">
     @if($errors->has('email'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix un correu valid</p>
      </div>
    @endif
    
    <br>

    <label class="mb-4" for="rol">rol: </label>
    <select name="rol" id="rol">
        @if($usuarios->rol == 'admin') 
          <option value="admin" selected> admin</option> 
          <option value="superAdmin" > superAdmin</option> 
        @else
          <option value="superAdmin" selected> superAdmin</option> 
          <option value="admin" > admin</option>  
        @endif     
    </select>	
    

  </div>
  <button type="submit" class="btn btn-primary">guardar</button>
  <a href="/user" class="btn btn-danger ml-4">cancela</a>
@endsection
