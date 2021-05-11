@include("cabecera")

<link rel="stylesheet" href="/css/menu.css">

<nav class="navbar navbar-expand-lg navbar-light "> 
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="/">Inici</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <?php  
          $date = date("Y-m-d");
        ?>
       @foreach($categories as $categoria)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink{{$categoria->id}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{$categoria->categoria}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink{{$categoria->id}}">
              <?php  
              $date = date("Y-m-d");
              $cont = 0;
              ?>
              @foreach($pagaments as $pagament)
                @if($pagament->categoria_id == $categoria->id)
                  <?php $cont++ ?>
                  @if($pagament->data_fi >= $date && $pagament->data_inici <= $date && $pagament->estat == 'Actiu')
                    <li>
                          <a class="dropdown-item" href="/pagament/{{$pagament->id}}">{{$pagament->titol}}</a>
                    </li>
                  @endif
                @elseif($loop->last && $cont == 0) 
                  <li>
                    <a class="dropdown-item" href="#">No hi ha pagaments</a>
                  </li>
                @endif
              @endforeach
            </ul>
          </li>
       @endforeach

        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="/login">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>