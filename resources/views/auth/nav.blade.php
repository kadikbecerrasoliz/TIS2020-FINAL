<nav class="mb-1 navbar navbar-expand-lg navbar-dark unique-color-dark">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('logo/logo.png') }}" width="35" height="35" class="img-fluid" alt="Responsive image">
         ActionSoft SRL
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
      aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Noticias
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/convoc">Convocatorias</a>
            </li>
            @if (Auth::guest())
                <li class="nav-item">
                    <a class="nav-link" href="/postulantes/create">Registro de Postulantes</a>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav ml-auto">
            @if (Auth::guest())
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fab fa-facebook-f"></i>
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fab fa-instagram"></i> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">
                        Login
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link active" href="#!">
                        @foreach (Auth::user()->roles as $role)
                            {{$role->name}}
                        @endforeach
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="/home">
                            Mi Perfil
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Salir
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>