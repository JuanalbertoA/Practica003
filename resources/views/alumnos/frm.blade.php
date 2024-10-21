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
        <h2>Registrando Alumno</h2>
        <form action="{{ route('alumnos.store') }}" method="POST">
    @elseif ($accion == 'E')
        <h2>Editando Alumno</h2>
        <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
    @elseif ($accion == 'D')
        <h2>Eliminar Alumno</h2>
        <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST">
    @endif

    @csrf

    <div class="row mb-3">
        <label for="noctrl" class="col-sm-3 col-form-label">Número de Control:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="noctrl" name="noctrl" value="{{ old('noctrl', $alumno->noctrl) }}" {{$des}}>
            @error("noctrl")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" {{$des}}>
            @error("nombre")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="apellidop" class="col-sm-3 col-form-label">Apellido Paterno:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="apellidop" name="apellidop" value="{{ old('apellidop', $alumno->apellidop) }}" {{$des}}>
            @error("apellidop")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="apellidom" class="col-sm-3 col-form-label">Apellido Materno:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="apellidom" name="apellidom" value="{{ old('apellidom', $alumno->apellidom) }}" {{$des}}>
            @error("apellidom")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="sexo" class="col-sm-3 col-form-label">Sexo:</label>
        <div class="col-sm-9">
            <select class="form-select" id="sexo" name="sexo" {{$des}}>
                <option value="">Seleccione un sexo</option>
                <option value="M" {{ (old('sexo', $alumno->sexo) == 'M') ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ (old('sexo', $alumno->sexo) == 'F') ? 'selected' : '' }}>Femenino</option>
            </select>
            @error("sexo")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-sm-3 col-form-label">Email:</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $alumno->email) }}" {{$des}}>
            @error("email")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="carrera_id" class="col-sm-3 col-form-label">Carrera:</label>
        <div class="col-sm-9">
            <select class="form-select" id="carrera_id" name="carrera_id" {{$des}}>
                <option value="">Seleccione una carrera</option>
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->id }}" {{ (old('carrera_id', $alumno->carrera_id) == $carrera->id) ? 'selected' : '' }}>
                        {{ $carrera->nombrecarrera }}
                    </option>
                @endforeach
            </select>
            @error("carrera_id")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="text-center">
        @if(!empty($txtbtn))
            <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
        @endif
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
    </form>
</div>

@endsection
