<nav class="navbar navbar-expand-md navbar-light bg-light rounded mb-3">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav text-md-center nav-justified w-100">

            @guest
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('login') }}">Login <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('register') }}">Registrar <span class="sr-only">(current)</span></a>
                </li>
                @else

                    <li class="nav-item active">
                        <a class="nav-link" href="{{route("processos.index")}}">Home<span
                                    class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("processos.index")}}">Processos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("etapas.index")}}">Etapas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("categorias.index")}}">Categorias</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
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