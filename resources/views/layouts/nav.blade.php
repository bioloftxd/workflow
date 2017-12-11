
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><i class="fa fa-ravelry" aria-hidden="true"></i> WORKFLOW</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      @guest
          <li class="nav-item active">
              <a class="nav-link" href="{{ route('login') }}">Login <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
              <a class="nav-link" href="{{ route('register') }}">Registrar <span class="sr-only">(current)</span></a>
          </li>
      @else
      <li class="nav-item active">
        <a class="nav-link" href="{{route("processos.index")}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="processo"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" href="#">Processos</a>
                <div class="dropdown-menu" aria-labelledby="processo">
                    <a class="dropdown-item" href="{{route('processos.create')}}">Cadastrar</a>
                    <a class="dropdown-item" href="{{route('processos.index')}}">Listar</a>
                </div>
        </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route("categorias.index")}}">Categorias</a>
      </li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
      <li class="nav-item dropdown navbar-right">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01"
             data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false"><i class="fa fa-comments-o" aria-hidden="true"></i>
{{ Auth::user()->name }}</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Meus Dados</a>

              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">Sair</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    style="display: none;">
                  {{ csrf_field() }}
              </form>

          </div>
      </li>
      @endguest
    </ul>

  </div>
</nav>
