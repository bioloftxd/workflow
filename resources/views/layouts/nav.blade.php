<div class="masthead">
    <h3 class="text-muted">Projeto Workflow - Framework2</h3>

    <nav class="navbar navbar-expand-md navbar-light bg-light rounded mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav text-md-center nav-justified w-100">

                @auth
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Processos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Etapas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Nome do Fidégua</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown01">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    </li>
                @endguest

            </ul>
        </div>
    </nav>
</div>