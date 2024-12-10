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
        <h2>Registrando Tipo de Inscripción</h2>
        <form action="{{ route('tipoinscs.store') }}" method="POST">
    @elseif ($accion == 'E')
        <h2>Editando Tipo de Inscripción</h2>
        <form action="{{ route('tipoinscs.update', $tipoinsc->id) }}" method="POST">
        @method('PUT')
    @elseif ($accion == 'D')
        <h2>Eliminar Tipo de Inscripción</h2>
        <form action="{{ route('tipoinscs.destroy', $tipoinsc->id) }}" method="POST">
        @method('DELETE')
    @endif

    @csrf

    <div class="row mb-3">
        <label for="tipo" class="col-sm-3 col-form-label">Tipo:</label>
        <div class="col-sm-9">
            <select class="form-select" id="tipo" name="tipo" {{ $des }}>
                <option value="Inscripción" {{ old('tipo', $tipoinsc->tipo) == 'Inscripción' ? 'selected' : '' }}>Inscripción</option>
                <option value="Reinscripción" {{ old('tipo', $tipoinsc->tipo) == 'Reinscripción' ? 'selected' : '' }}>Reinscripción</option>
            </select>
            @error("tipo")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="fecha" class="col-sm-3 col-form-label">Fecha:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $tipoinsc->fecha) }}" {{ $des }}>
            @error("fecha")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="periodos_id" class="col-sm-3 col-form-label">Periodo:</label>
        <div class="col-sm-9">
            <select class="form-select" id="periodos_id" name="periodos_id" {{ $des }}>
                <option value="">Seleccione un periodo</option>
                @foreach ($periodos as $periodo)
                    <option value="{{ $periodo->id }}" {{ old('periodos_id', $tipoinsc->periodos_id) == $periodo->id ? 'selected' : '' }}>
                        {{ $periodo->periodo }}
                    </option>
                @endforeach
            </select>
            @error("periodos_id")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="text-center">
        @if(!empty($txtbtn))
            <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
        @endif
        <a href="{{ route('tipoinscs.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
    </form>
</div>

@endsection
