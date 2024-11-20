{{-- resources/views/grupos/index.blade.php --}}
@extends('menu2')

@section('contenido2')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">Asignación de Grupos</h3>
                </div>
                <div class="card-body">
                    {{-- Mostrar errores si existen --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Mostrar mensaje de éxito --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Formulario de filtros -->
                    <form id="filtrosForm" action="{{ route('grupos.index') }}" method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="periodo">Periodo:</label>
                                    <select class="form-control" id="periodo" name="periodo" required onchange="this.form.submit()">
                                        <option value="">Seleccionar periodo</option>
                                        @foreach ($periodos as $periodo)
                                            <option value="{{ $periodo->id }}" {{ $selectedPeriodo == $periodo->id ? 'selected' : '' }}>
                                                {{ $periodo->periodo }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="carrera">Carrera:</label>
                                    <select class="form-control" id="carrera" name="carrera" required onchange="this.form.submit()">
                                        <option value="">Seleccionar carrera</option>
                                        @foreach ($carreras as $carrera)
                                            <option value="{{ $carrera->id }}" {{ $selectedCarrera == $carrera->id ? 'selected' : '' }}>
                                                {{ $carrera->nombrecarrera }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if($selectedPeriodo && $selectedCarrera)
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="semestre">Semestre:</label>
                                        <select class="form-control" id="semestre" name="semestre" required onchange="this.form.submit()">
                                            <option value="">Seleccionar semestre</option>
                                            @foreach ($semestres as $semestre)
                                                <option value="{{ $semestre }}" {{ $selectedSemestre == $semestre ? 'selected' : '' }}>
                                                    {{ $semestre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="departamento">Departamento:</label>
                                        <select class="form-control" id="departamento" name="departamento" required onchange="this.form.submit()">
                                            <option value="">Seleccionar departamento</option>
                                            @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->id }}" {{ $selectedDepto == $departamento->id ? 'selected' : '' }}>
                                                    {{ $departamento->nombredepto }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>

                    <!-- Formulario de creación de grupo -->
                    @if($selectedPeriodo && $selectedCarrera && $selectedSemestre && $selectedDepto)
                        <form id="grupoForm" action="{{ route('grupos.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="periodo" value="{{ $selectedPeriodo }}">
                            <input type="hidden" name="carrera" value="{{ $selectedCarrera }}">
                            <input type="hidden" name="semestre" value="{{ $selectedSemestre }}">
                            <input type="hidden" name="departamento" value="{{ $selectedDepto }}">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="grupo">ID Grupo:</label>
                                        <input type="text" class="form-control" id="grupo" name="grupo" value="{{ old('grupo') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="max_alumnos">Máximo Alumnos:</label>
                                        <input type="number" class="form-control" id="max_alumnos" name="max_alumnos" value="{{ old('max_alumnos') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción:</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="2">{{ old('descripcion') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                @if($materiasAbiertas->isNotEmpty())
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Materias Disponibles:</label>
                                            <div class="border p-3" style="max-height: 200px; overflow-y: auto;">
                                                @foreach($materiasAbiertas as $materia)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                               name="materias[]" 
                                                               value="{{ $materia->materia_id }}"
                                                               id="materia_{{ $materia->id }}"
                                                               {{ (is_array(old('materias')) && in_array($materia->materia_id, old('materias'))) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="materia_{{ $materia->id }}">
                                                            {{ $materia->materia->nombremateria }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($personalFiltrado->isNotEmpty())
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Personal Disponible:</label>
                                            <div class="border p-3" style="max-height: 200px; overflow-y: auto;">
                                                @foreach($personalFiltrado as $persona)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                               name="personal[]" 
                                                               value="{{ $persona->id }}"
                                                               id="personal_{{ $persona->id }}"
                                                               {{ (is_array(old('personal')) && in_array($persona->id, old('personal'))) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="personal_{{ $persona->id }}">
                                                            {{ $persona->nombres }} {{ $persona->apellidop }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Iniciar Horario</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
