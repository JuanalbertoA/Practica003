@extends('plantilla2')

@section("contenido")
<div class="container-fluid mt-3">
    <div class="row">
        <!-- Menú lateral -->
        <div class="col-md-3">
            <div class="list-group" style="height: 100vh; overflow-y: auto;">
                <a href="#" class="list-group-item list-group-item-action">Periodos</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Ene-Jun 24</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Ago-Dic-24</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Ene-Jul 25</a>
            </div>
        </div>
        <!-- Contenido principal -->
        <div class="col-md-9">
            <h1>catálogo</h1>
            <p>Aqui va Horarios</p>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgcP_wehvKkrV814xaJy4L4CaBHaJHAvvFWA&s" alt="Bienvenidos al catálogo de películas" style="width: 100%; max-width: 600px; height: auto;">
        </div>
    </div>
</div>
@endsection
