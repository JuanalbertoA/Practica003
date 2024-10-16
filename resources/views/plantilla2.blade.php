<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Peliculas</title>
    @vite(["resources/js/app.js"])
</head>
<body>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                @include("menu1")
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                @yield("izquierda")
            </div>
            <div class="col-9">
                @yield("derecha")
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                @yield("contenido")
            </div>
        </div>

        <!-- Pie de página -->
        <div class="row mt-4" style="background-color: rgb(240, 240, 240); padding: 10px;">
            <div class="col text-center">
                @auth
                    <p class="mb-0">Usuario: {{ Auth::user()->name }}</p>
                    <p class="mb-0">Correo: {{ Auth::user()->email }}</p>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
