@extends("menu2")

@section("contenido2")

<div class="container text-center">
    <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </ul>

    @if ($accion == 'C')
        <h2>Registrando Materia</h2>
        <form action="{{ route('materias.store') }}" method="POST">
    @elseif ($accion == 'E')
        <h2>Editando Materia</h2>
        <form action="{{ route('materias.update', $materia->id) }}" method="POST">
    @elseif ($accion == 'D')
        <h2>Eliminar Materia</h2>
        <form action="{{ route('materias.destroy', $materia->id) }}" method="POST">
    @endif

    @csrf
    @method($accion == 'D' ? 'DELETE' : 'POST')

    <div class="row mb-3">
        <label for="idmateria" class="col-sm-3 col-form-label">ID Materia:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="idmateria" name="idmateria" value="{{ old('idmateria', $materia->idmateria) }}" {{$des}}>
            @error("idmateria")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombremateria" class="col-sm-3 col-form-label">Nombre Materia:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombremateria" name="nombremateria" value="{{ old('nombremateria', $materia->nombremateria) }}" {{$des}}>
            @error("nombremateria")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="nivel" class="col-sm-3 col-form-label">Nivel:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nivel" name="nivel" value="{{ old('nivel', $materia->nivel) }}" {{$des}}>
            @error("nivel")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombremediano" class="col-sm-3 col-form-label">Nombre Mediano:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombremediano" name="nombremediano" value="{{ old('nombremediano', $materia->nombremediano) }}" {{$des}}>
            @error("nombremediano")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombrecorto" class="col-sm-3 col-form-label">Nombre Corto:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{ old('nombrecorto', $materia->nombrecorto) }}" {{$des}}>
            @error("nombrecorto")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="modalidad" class="col-sm-3 col-form-label">Modalidad:</label>
        <div class="col-sm-9">
            <select class="form-select" id="modalidad" name="modalidad" {{$des}}>
                <option value="">Seleccione una modalidad</option>
                <option value="1" {{ (old('modalidad', $materia->modalidad) == '1') ? 'selected' : '' }}>Modalidad 1</option>
                <option value="2" {{ (old('modalidad', $materia->modalidad) == '2') ? 'selected' : '' }}>Modalidad 2</option>
            </select>
            @error("modalidad")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="reticula_id" class="col-sm-3 col-form-label">Retícula:</label>
        <div class="col-sm-9">
            <select class="form-select" id="reticula_id" name="reticula_id" {{$des}}>
                <option value="">Seleccione una retícula</option>
                @foreach ($reticulas as $reticula)
                    <option value="{{ $reticula->id }}" {{ (old('reticula_id', $materia->reticula_id) == $reticula->id) ? 'selected' : '' }}>
                        {{ $reticula->descripcion }} <!-- Cambia esto si el campo de nombre en tu modelo es diferente -->
                    </option>
                @endforeach
            </select>
            @error("reticula_id")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="text-center">
        @if(!empty($txtbtn))
            <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
        @endif
        <a href="{{ route('materias.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
    </form>
</div>

@endsection
