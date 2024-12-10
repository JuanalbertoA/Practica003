@extends("menu2")

@section("contenido2")

<div class="container">
    <!-- Errores -->
    <ul class="text-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <!-- Título del formulario -->
    <h2 class="mb-4 text-center">
        @if ($accion == 'C') Registrando Grupo 
        @elseif ($accion == 'E') Editando Grupo 
        @elseif ($accion == 'D') Eliminar Grupo 
        @endif
    </h2>

    <!-- Formulario -->
    <form action="{{ $accion == 'C' ? route('grupos21318.store') : ($accion == 'E' ? route('grupos21318.update', $grupo->id) : route('grupos21318.destroy', $grupo->id)) }}" 
          method="POST" class="mb-4">
        @csrf
        @if ($accion == 'E') @method("PUT") @elseif ($accion == 'D') @method("DELETE") @endif

        <div class="row">
            <!-- Grupo -->
            <div class="col-md-6 mb-3">
                <label for="grupo" class="form-label">Grupo:</label>
                <input type="text" class="form-control" id="grupo" name="grupo" value="{{ old('grupo', $grupo->grupo) }}" {{ $des }}>
                @error("grupo") <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Personal -->
            <div class="col-md-6 mb-3">
                <label for="personal_id" class="form-label">Personal:</label>
                <select class="form-select" id="personal_id" name="personal_id" {{ $des }}>
                    <option value="">Seleccione un personal</option>
                    @foreach ($personals as $personal)
                        <option value="{{ $personal->id }}" {{ old('personal_id', $grupo->personal_id) == $personal->id ? 'selected' : '' }}>
                            {{ $personal->nombres }} {{ $personal->apellidop }} {{ $personal->apellidom }}
                        </option>
                    @endforeach
                </select>
                @error("personal_id") <p class="text-danger">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="row">
            <!-- Descripción -->
            <div class="col-md-6 mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $grupo->descripcion) }}" {{ $des }}>
                @error("descripcion") <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Materia Abierta -->
            <div class="col-md-6 mb-3">
                <label for="materia_abierta_id" class="form-label">Materia Abierta:</label>
                <select class="form-select" id="materia_abierta_id" name="materia_abierta_id" {{ $des }}>
                    <option value="">Seleccione una materia</option>
                    @foreach ($materias_abiertas as $materia_abierta)
                        <option value="{{ $materia_abierta->id }}" {{ old('materia_abierta_id', $grupo->materia_abierta_id) == $materia_abierta->id ? 'selected' : '' }}>
                            {{ $materia_abierta->materia->nombremateria ?? 'Materia no disponible' }}
                        </option>
                    @endforeach
                </select>
                @error("materia_abierta_id") <p class="text-danger">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="row">
            <!-- Fecha -->
            <div class="col-md-6 mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $grupo->fecha) }}" {{ $des }}>
                @error("fecha") <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <!-- Periodo -->
            <div class="col-md-6 mb-3">
                <label for="periodo_id" class="form-label">Periodo:</label>
                <select class="form-select" id="periodo_id" name="periodo_id" {{ $des }}>
                    <option value="">Seleccione un periodo</option>
                    @foreach ($periodos as $periodo)
                        <option value="{{ $periodo->id }}" {{ old('periodo_id', $grupo->periodo_id) == $periodo->id ? 'selected' : '' }}>
                            {{ $periodo->periodo }}
                        </option>
                    @endforeach
                </select>
                @error("periodo_id") <p class="text-danger">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="row">
            <!-- Máximo Alumnos -->
            <div class="col-md-6 mb-3">
                <label for="max_alumnos" class="form-label">Máximo de Alumnos:</label>
                <input type="number" class="form-control" id="max_alumnos" name="max_alumnos" value="{{ old('max_alumnos', $grupo->max_alumnos) }}" {{ $des }}>
                @error("max_alumnos") <p class="text-danger">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Botones -->
        <div class="text-center mt-4">
            @if(!empty($txtbtn))
                <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
            @endif
            <a href="{{ route('grupos21318.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </form>
</div>


@include('grupohorarios21318.frm',['grupo_id'=>$grupo->id])


@endsection
