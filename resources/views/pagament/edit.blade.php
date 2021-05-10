@extends('admin.adminMaster')

@section('content')
<form class='container' action="/pagament/edit/{{$pagaments->id}}" method="Post">
  {!! csrf_field() !!}
  <div class="form-group">
    <h3 class="mb-4">Editar Pagament</h3>

    <label class="mb-4" for="categoria">Categoria: </label>
    <select name="categoria" id="categoria">
    @foreach ($categorias  as $categoria)
      
      @if($categoria->id == $pagaments->categoria_id)
        <option value="{{$categoria->id}}" selected> {{$categoria -> categoria}}</option>   
      @else
        <option value="{{$categoria->id}}"> {{$categoria -> categoria}}</option> 
      @endif 
         
    @endforeach 
    </select>

    <br>

    <label class="mb-4" for="compte">Compte: </label>
    <select name="compte" id="compte">
    @foreach ($comptes  as $compte)
      @if($compte->id ==  $pagaments->compte_id)
        <option value="{{$compte ->id}}" selected> {{$compte -> compte}}</option>
      @else
        <option value="{{$compte ->id}}")> {{$compte -> compte}}</option>    
      
      @endif 
            

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
      @if($curs->id == $pagaments->curs_id) 
    
      <option value="{{$curs->id}}" selected> {{$curs-> curs}}</option>  
      @else
      <option value="{{$curs->id}}" > {{$curs-> curs}}</option> 
      @endif
    @endforeach 
    </select>

    <br>

    <label class="mb-4 " for="titol">Titol: </label>
    <input type="text" class="form-control" name="titol" id="titol" value="{{ $pagaments->titol}}">
     @if($errors->has('titol'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix un titol valid</p>
      </div>
    @endif

    <br>

      <label class="mb-4 " for="desc">Descripció: </label>
    <textarea class="form-control " class="mb-4" name="desc" id="desc">{!! $pagaments->descripcio !!}</textarea>
     @if($errors->has('desc'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix una descripció valida</p>
      </div>
    @endif

    <label class="mb-4 " for="preu">Preu: </label>
    <input style="width:200px;" type="number" step='0.05' value="{{ $pagaments->preu}}" class="form-control" name="preu" id="preu">
     @if($errors->has('preu'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix un preu valid</p>
      </div>
    @endif

    <br>

    <label class="mb-4 " for="data_inici">Data inici: </label>
    <input style="width:200px;" type="date" class="form-control" name="data_inici" id="data_inici" value="{{ $pagaments->data_inici}}">
     @if($errors->has('data_inici'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix una data valida</p>
      </div>
    @endif

    <br>

    <label class="mb-4 " for="data_fi">Data fi: </label>
    <input style="width:200px;" type="date" class="form-control" name="data_fi" id="data_fi" value="{{ $pagaments->data_fi }}">
     @if($errors->has('data_inici'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix una data valida</p>
      </div>
    @endif        

    <br>

    <label class="mb-4" for="estat">Estat: </label>
    <select name="estat" id="estat">
        @if($pagaments->estat == 'Actiu') 
          <option value="Actiu" selected> Actiu</option> 
          <option value="Inactiu" > Inactiu</option> 
        @else
          <option value="Inactiu" selected> Inactiu</option> 
          <option value="Actiu" > Actiu</option>  
        @endif     
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

