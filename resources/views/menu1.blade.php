<nav class="navbar navbar-expand-lg" style="background-color: rgb(22, 130, 218);">
  <div class="container-fluid">
      <a class="navbar-brand" href="#">Horarios</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('catalogos')}}">Catalogos</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('catalogos1')}}">Horarios</a>
              </li>    
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('catalogos2')}}">Proyectos Individuales</a>
            </li> 
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#">Instrumentacion</a>
            </li>    
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#">Tutorias</a>
            </li> 
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('catalogos3')}}">Periodos</a>
            </li>        
              @guest   
                 
              @endguest        
              @auth
              <li class="nav-item" role="presentation">
                  <form action="{{ route('logout') }}" method="post">
                      @csrf
                      <button class="btn btn-danger" type="submit">Logout</button>
                  </form>
              </li>        
              @endauth
          </ul>
          <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-primary" type="submit">Search</button>
          </form>
      </div>
  </div>
</nav>
