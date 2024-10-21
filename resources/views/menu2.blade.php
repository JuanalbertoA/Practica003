<nav class="navbar navbar-expand-lg" style="background-color: rgb(22, 130, 218);">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Horarios</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Catálogos -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="catalogosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catálogos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="catalogosDropdown">
                        <li><a class="dropdown-item" href="#">Periodos</a></li>
                        <li><a class="dropdown-item" href="{{route('plazas.index')}}">Plazas</a></li>
                        <li><a class="dropdown-item" href="{{route('puestos.index')}}">Puestos</a></li>
                        <li><a class="dropdown-item" href="">Personal</a></li>
                        <li><a class="dropdown-item" href="{{route('deptos.index')}}">Deptos</a></li>
                        <li><a class="dropdown-item" href="{{route('carreras.index')}}">Carreras</a></li>
                        <li><a class="dropdown-item" href="#">Retículas</a></li>
                        <li><a class="dropdown-item" href="#">Materias</a></li>
                        <li><a class="dropdown-item" href="{{route('alumnos.index')}}">Alumnos</a></li>
                    </ul>
                </li>

                <!-- Horarios -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="horariosDropdown" role="button" aria-expanded="false">
                        Horarios
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="horariosDropdown">
                        <li class="d-flex justify-content-around">
                            <a class="dropdown-item" href="#">Docentes</a>
                            <a class="dropdown-item" href="#">Alumnos</a>
                        </li>
                    </ul>
                </li>

                <!-- Proyectos Individuales -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="proyectosDropdown" role="button" aria-expanded="false">
                        Proyectos Individuales
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="proyectosDropdown">
                        <li class="d-flex justify-content-around">
                            <a class="dropdown-item" href="#">Capacitación</a>
                            <a class="dropdown-item" href="#">Asesorías Doc.</a>
                            <a class="dropdown-item" href="#">Proyectos</a>
                            <a class="dropdown-item" href="#">Material Didáctico</a>
                            <a class="dropdown-item" href="#">Docencia e Inv.</a>
                            <a class="dropdown-item" href="#">Asesoría Proyectos Ext.</a>
                            <a class="dropdown-item" href="#">Asesoría a S.S.</a>
                        </li>
                    </ul>
                </li>

                <!-- Instrumentación -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Instrumentación</a>
                </li>

                <!-- Tutorías -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Tutorías</a>
                </li>

                <!-- Periodos -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Periodos</a>
                </li>

                @guest
                @endguest        

                @auth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                </li>        
                @endauth
            </ul>
            <form class="d-flex" role="search">
                <input name="txtbuscar" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<div>
    @yield("contenido2")
    <div style="text-align: center;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgcP_wehvKkrV814xaJy4L4CaBHaJHAvvFWA&s" alt="Bienvenidos al catálogo de Horarios" style="width: 100%; max-width: 600px; height: auto;">
        
        <p style="font-size: 24px; font-family: 'Arial', sans-serif; color: #333333; font-weight: bold; margin-top: 20px;">
            Bienvenidos al Horario
        </p>
</div>

<!-- Footer con información del usuario autenticado -->
<footer class="text-center mt-4">
    @auth
    <div class="footer-bar">
        <p>Usuario: {{ Auth::user()->name }}</p>
        <p>Correo: {{ Auth::user()->email }}</p>
    </div>
    @endauth
</footer>

<!-- CSS adicional -->
<style>
    .dropdown-menu {
        display: none; /* Oculta el submenú por defecto */
    }

    .nav-item.dropdown:hover .dropdown-menu {
        display: block; /* Muestra el submenú al pasar el mouse */
    }

    .dropdown-menu.d-flex {
        flex-direction: row; /* Asegúrate de que los submenús se muestren horizontalmente */
        padding: 0; /* Ajusta el padding si es necesario */
    }
    
    .dropdown-item {
        white-space: nowrap; /* Evita que los elementos del submenú se rompan en múltiples líneas */
    }

    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: rgb(70, 80, 100); /* Azul grisáceo */
        color: white;
        padding: 10px 0;
    }

    .footer-bar {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
</style>
