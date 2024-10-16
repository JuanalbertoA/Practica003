@extends('plantilla2')

@section("contenido")
<div class="container-fluid mt-3">
    <div class="row">
        <!-- Menú lateral -->
        <div class="col-md-3">
            <div class="list-group" style="height: 100vh; overflow-y: auto;">
                <a href="#" class="list-group-item list-group-item-action">Todo el Horario</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Periodos</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Plazas</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Puestos</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Personal</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Deptos</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Carreras</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Reticulas</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Materias</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Alumnos</a>
            </div>
        </div>
        <!-- Contenido principal -->
        <div class="col-md-9">
            <h1>catálogo</h1>
            <p>Aquí va el contenido de catálogo</p>
        </div>
    </div>
</div>


@endsection
