@extends('plantilla2')

@section("izquierda")
<div class="list-group d-flex flex-row">
    <a href="#" class="list-group-item list-group-item-action">Todo el Horario</a>
    <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Docentes</a>
    <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Alumnos</a>
</div>
@endsection

@section("derecha")
<h1>Aquí va el contenido de Horarios</h1>
<div class="text-center mt-4">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgcP_wehvKkrV814xaJy4L4CaBHaJHAvvFWA&s" alt="Bienvenidos al catálogo de películas" style="width: 100%; max-width: 600px; height: auto;">
</div>
@endsection
