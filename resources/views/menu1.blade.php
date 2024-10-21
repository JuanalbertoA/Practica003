<nav class="navbar navbar-expand-lg bg-danger">{{-- <--cambia el color --}}
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
            <a class="nav-link" href="#">Contactanos</a>
          </li>
          <li>
            <a href="{{ route("register") }}" class="nav-link">Registrate</a>
          </li>
          @guest
          <li class="nav-item" role="presentation">
              <a href="#" class="nav-link">Ayuda</a>
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
  <div>
    @yield("contenido1")
    <div style="text-align: center;">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgcP_wehvKkrV814xaJy4L4CaBHaJHAvvFWA&s" alt="Bienvenidos al catálogo de Horarios" style="width: 100%; max-width: 600px; height: auto;">
      
      <p style="font-size: 24px; font-family: 'Arial', sans-serif; color: #333333; font-weight: bold; margin-top: 20px;">
          Bienvenidos al Horario
      </p>
  
      <p style="font-size: 18px; font-family: 'Arial', sans-serif; color: #555555; margin-top: 20px;">
          Aquí tienes algunos enlaces útiles:
      </p>
  
      <ul style="list-style-type: none; padding: 0;">
          <li><a href="https://laravel.com/" style="text-decoration: none; color: #007BFF;">Laravel</a></li>
          <li><a href="https://getbootstrap.com/" style="text-decoration: none; color: #007BFF;">Bootstrap</a></li>
          <li><a href="https://vitejs.dev/" style="text-decoration: none; color: #007BFF;">Vite</a></li>
          <li><a href="https://www.w3.org/TR/html52/" style="text-decoration: none; color: #007BFF;">HTML5</a></li>
          <li><a href="https://www.php.net/" style="text-decoration: none; color: #007BFF;">PHP</a></li>
      </ul>
      </ul>
  </div>
   </div>