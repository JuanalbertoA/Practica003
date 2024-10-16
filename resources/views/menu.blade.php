<nav class="navbar navbar-expand-lg bg-danger">{{-- <--cambia el color --}}
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Horarios</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/inicio">Acerca de</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('catalogos')}}">Contactanos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Ayuda</a>
          </li>
          @guest
          <li class="nav-item" role="presentation">
              <a href="{{ route("login") }}" class="nav-link">Ayuda</a>
          </li>               
          @endguest        
          @guest
          <li class="nav-item" role="presentation">
              <a href="{{ route("login") }}" class="nav-link">Login</a>
          </li>               
          @endguest       
         
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-primary" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>