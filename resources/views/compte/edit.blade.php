@extends('admin.adminMaster')

@section('content')
<form class='container' action="/compte/edit/{{$compte->id}}" method="Post">
  {!! csrf_field() !!}
  <div class="form-group">
 	<h3>Editar Compte</h3>
    <label for="compte">Compte</label>
    <input type="text" class="form-control" name="compte" id="compte" value="{{$compte->compte}}">
    @if($errors->has('compte'))
    	<div style='height: 50px;' class="alert alert-danger"> 
    		<p>Introdueix una compte valida</p>
    	</div>
    @endif
    <label for="fuc">Fuc</label>
    <input type="text" class="form-control" name="fuc" id="fuc" value="{{$compte->fuc}}">
    @if($errors->has('fuc'))
    	<div style='height: 50px;' class="alert alert-danger"> 
    		<p>Introdueix un fuc valid</p>
    	</div>
    @endif	
    <label for="clau">Clau</label>
    <input type="text" class="form-control" name="clau" id="clau" value="{{$compte->clau}}">
    @if($errors->has('clau'))
    	<div style='height: 50px;' class="alert alert-danger"> 
    		<p>Introdueix una clau valida</p>
    	</div>
    @endif	
    <br>
    <label class="mb-4" for="estat">Estat: </label>
    <select name="estat" id="estat">
        @if($compte->estat == 'Actiu') 
          <option value="Actiu" selected> Actiu</option> 
          <option value="Inactiu" > Inactiu</option> 
        @else
          <option value="Inactiu" selected> Inactiu</option> 
          <option value="Actiu" > Actiu</option>  
        @endif     
    </select>	
  </div>
  <button type="submit" class="btn btn-primary">guardar</button>
  <a href="/compte" class="btn btn-danger ml-4">cancela</a>
</form>

@endsection

