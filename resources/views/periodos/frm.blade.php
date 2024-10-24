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
        <h2>Registrando Periodo</h2>
        <form action="{{ route('periodos.store') }}" method="POST">
    @elseif ($accion == 'E')
        <h2>Editando Periodo</h2>
        <form action="{{ route('periodos.update', $periodo->id) }}" method="POST">
    @elseif ($accion == 'D')
        <h2>Eliminar Periodo</h2>
        <form action="{{ route('periodos.destroy', $periodo->id) }}" method="POST">
    @endif

    @csrf
    <div class="row mb-3">
        <label for="idperiodo" class="col-sm-3 col-form-label">ID Periodo:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="idperiodo" name="idperiodo" value="{{ old('idperiodo', $periodo->idperiodo ?? '') }}" {{ $des }}>
            @error("idperiodo")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="periodo" class="col-sm-3 col-form-label">Periodo:</label>
        <div class="col-sm-9">
            <select class="form-control" id="periodo" name="periodo" {{ $des }}>
                <option value="">Selecciona un periodo</option>
                <option value="Ene-Jun" {{ (old('periodo', $periodo->periodo ?? '') == 'Ene-Jun') ? 'selected' : '' }}>Ene-Jun</option>
                <option value="Ago-Dic" {{ (old('periodo', $periodo->periodo ?? '') == 'Ago-Dic') ? 'selected' : '' }}>Ago-Dic</option>
            </select>
            @error("periodo")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="desccorta" class="col-sm-3 col-form-label">Descripción Corta:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="desccorta" name="desccorta" value="{{ old('desccorta', $periodo->desccorta ?? '') }}" {{ $des }}>
            @error("desccorta")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="fechaini" class="col-sm-3 col-form-label">Fecha Inicio:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="fechaini" name="fechaini" value="{{ old('fechaini', $periodo->fechaini)}}" {{ $des }}>
            @error("fechaini")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="fechafin" class="col-sm-3 col-form-label">Fecha Fin:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="fechafin" name="fechafin" value="{{ old('fechafin', $periodo->fechafin)}}" {{ $des }}>
            @error("fechafin")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="text-center">
        @if(!empty($txtbtn))
            <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
        @endif
        <a href="{{ route('periodos.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
    </form>
</div>

@endsection

