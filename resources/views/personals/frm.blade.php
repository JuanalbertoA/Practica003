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
        <h2>Registrando Personal</h2>
        <form action="{{ route('personals.store') }}" method="POST">
    @elseif ($accion == 'E')
        <h2>Editando Personal</h2>
        <form action="{{ route('personals.update', $personal->id) }}" method="POST">
    @elseif ($accion == 'D')
        <h2>Eliminar Personal</h2>
        <form action="{{ route('personals.destroy', $personal->id) }}" method="POST">
    @endif

    @csrf

    <div class="row mb-3">
        <label for="RFC" class="col-sm-3 col-form-label">RFC:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="RFC" name="RFC" value="{{ old('RFC', $personal->RFC ?? '') }}" {{ $des }}>
            @error("RFC")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombres" class="col-sm-3 col-form-label">Nombres:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres', $personal->nombres ?? '') }}" {{ $des }}>
            @error("nombres")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="apellidop" class="col-sm-3 col-form-label">Apellido Paterno:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="apellidop" name="apellidop" value="{{ old('apellidop', $personal->apellidop ?? '') }}" {{ $des }}>
            @error("apellidop")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="apellidom" class="col-sm-3 col-form-label">Apellido Materno:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="apellidom" name="apellidom" value="{{ old('apellidom', $personal->apellidom ?? '') }}" {{ $des }}>
            @error("apellidom")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="licenciatura" class="col-sm-3 col-form-label">Licenciatura:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="licenciatura" name="licenciatura" value="{{ old('licenciatura', $personal->licenciatura ?? '') }}" {{ $des }}>
            @error("licenciatura")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="lictit" class="col-sm-3 col-form-label">Licenciatura Título:</label>
        <div class="col-sm-9">
            <input type="checkbox" id="lictit" name="lictit" value="1" {{ old('lictit', $personal->lictit ?? false) ? 'checked' : '' }} {{ $des }}>
            @error("lictit")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="especializacion" class="col-sm-3 col-form-label">Especialización:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="especializacion" name="especializacion" value="{{ old('especializacion', $personal->especializacion ?? '') }}" {{ $des }}>
            @error("especializacion")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="esptit" class="col-sm-3 col-form-label">Especialización Título:</label>
        <div class="col-sm-9">
            <input type="checkbox" id="esptit" name="esptit" value="1" {{ old('esptit', $personal->esptit ?? false) ? 'checked' : '' }} {{ $des }}>
            @error("esptit")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="maestria" class="col-sm-3 col-form-label">Maestría:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="maestria" name="maestria" value="{{ old('maestria', $personal->maestria ?? '') }}" {{ $des }}>
            @error("maestria")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="maetit" class="col-sm-3 col-form-label">Maestría Título:</label>
        <div class="col-sm-9">
            <input type="checkbox" id="maetit" name="maetit" value="1" {{ old('maetit', $personal->maetit ?? false) ? 'checked' : '' }} {{ $des }}>
            @error("maetit")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="doctorado" class="col-sm-3 col-form-label">Doctorado:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="doctorado" name="doctorado" value="{{ old('doctorado', $personal->doctorado ?? '') }}" {{ $des }}>
            @error("doctorado")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="doctit" class="col-sm-3 col-form-label">Doctorado Título:</label>
        <div class="col-sm-9">
            <input type="checkbox" id="doctit" name="doctit" value="1" {{ old('doctit', $personal->doctit ?? false) ? 'checked' : '' }} {{ $des }}>
            @error("doctit")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="fechaingsep" class="col-sm-3 col-form-label">Fecha Ingreso SEP:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="fechaingsep" name="fechaingsep" value="{{ old('fechaingsep', $personal->fechaingsep ?? '') }}" {{ $des }}>
            @error("fechaingsep")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="fechaingins" class="col-sm-3 col-form-label">Fecha Ingreso Institucional:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="fechaingins" name="fechaingins" value="{{ old('fechaingins', $personal->fechaingins ?? '') }}" {{ $des }}>
            @error("fechaingins")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="depto_id" class="col-sm-3 col-form-label">Departamento:</label>
        <div class="col-sm-9">
            <select id="depto_id" name="depto_id" class="form-select" {{ $des }}>
                <option value="">Seleccionar Departamento</option>
                @foreach ($deptos as $depto)
                    <option value="{{ $depto->id }}" {{ old('depto_id', $personal->depto_id ?? '') == $depto->id ? 'selected' : '' }}>
                        {{ $depto->nombredepto }}
                    </option>
                @endforeach
            </select>
            @error("depto_id")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="puesto_id" class="col-sm-3 col-form-label">Puesto:</label>
        <div class="col-sm-9">
            <select id="puesto_id" name="puesto_id" class="form-select" {{ $des }}>
                <option value="">Seleccionar Puesto</option>
                @foreach ($puestos as $puesto)
                    <option value="{{ $puesto->id }}" {{ old('puesto_id', $personal->puesto_id ?? '') == $puesto->id ? 'selected' : '' }}>
                        {{ $puesto->nombre }}

                    </option>
                @endforeach
            </select>
            @error("puesto_id")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">
                @if ($accion == 'C') Crear
                @elseif ($accion == 'E') Editar
                @elseif ($accion == 'D') Eliminar
                @endif
            </button>
        </div>
    </div>

</form>
</div>

@endsection
