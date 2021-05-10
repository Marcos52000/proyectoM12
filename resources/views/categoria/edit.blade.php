@extends('admin.adminMaster')

@section('content')
<form class='container' action="/categoria/edit/{{$categoria->id}}" method="Post">
  {!! csrf_field() !!}
  <div class="form-group">
 	<h3>Editar Categoria</h3>
    <label for="categoria">Categoria</label>
    <input type="text" class="form-control" name="categoria" id="categoria" value="{{$categoria->categoria}}">
    @if($errors->any())
    	<div style='height: 50px;' class="alert alert-danger"> 
    		<p>Introdueix una categoria valida</p>
    	</div>
    @endif
    <br>
    <label class="mb-4" for="estat">Estat: </label>
    <select name="estat" id="estat">
        @if($categoria->estat == 'Actiu') 
          <option value="Actiu" selected> Actiu</option> 
          <option value="Inactiu" > Inactiu</option> 
        @else
          <option value="Inactiu" selected> Inactiu</option> 
          <option value="Actiu" > Actiu</option>  
        @endif     
    </select>
    
  </div>
  <button type="submit" class="btn btn-primary">guardar</button>
  <a href="/categoria" class="btn btn-danger ml-4">cancela</a>
</form>

@endsection

