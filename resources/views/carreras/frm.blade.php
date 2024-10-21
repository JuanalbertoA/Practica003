@extends("menu2")

@section("contenido2")

<div class="container text-center">
    <ul>
        @foreach ($errors->all() as $error)
            <li class="text-danger">
                {{ $error }}
            </li>
        @endforeach
    </ul>

    @if ($accion == 'C')
        <h2>Registrando Carrera</h2>
        <form action="{{ route('carreras.store') }}" method="POST">
    @elseif ($accion == 'E')
        <h2>Editando Carrera</h2>
        <form action="{{ route('carreras.update', $carrera->id) }}" method="POST">
    @elseif ($accion == 'D')
        <h2>Eliminar Carrera</h2>
        <form action="{{ route('carreras.destroy', $carrera->id) }}" method="POST">
    @endif

    @csrf

    <div class="row mb-3">
        <label for="idcarrera" class="col-sm-3 col-form-label">ID Carrera:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="idcarrera" name="idcarrera" value="{{ old('idcarrera', $carrera->idcarrera) }}" {{ $des }}>
            @error("idcarrera")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombrecarrera" class="col-sm-3 col-form-label">Nombre Carrera:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombrecarrera" name="nombrecarrera" value="{{ old('nombrecarrera', $carrera->nombrecarrera) }}" {{ $des }}>
            @error("nombrecarrera")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombremediano" class="col-sm-3 col-form-label">Nombre Mediano:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombremediano" name="nombremediano" value="{{ old('nombremediano', $carrera->nombremediano) }}" {{ $des }}>
            @error("nombremediano")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombrecorto" class="col-sm-3 col-form-label">Nombre Corto:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{ old('nombrecorto', $carrera->nombrecorto) }}" {{ $des }}>
            @error("nombrecorto")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="depto_id" class="col-sm-3 col-form-label">Departamento:</label>
        <div class="col-sm-9">
            <select class="form-select" id="depto_id" name="depto_id" {{ $des }}>
                <option value="">Seleccione un departamento</option>
                @foreach ($deptos as $depto)
                    <option value="{{ $depto->id }}" {{ (old('depto_id', $carrera->depto_id) == $depto->id) ? 'selected' : '' }}>
                        {{ $depto->nombredepto }}
                    </option>
                @endforeach
            </select>
            @error("depto_id")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="text-center">
        @if(!empty($txtbtn))
            <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
        @endif
        <a href="{{ route('carreras.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
    </form>
</div>

@endsection
