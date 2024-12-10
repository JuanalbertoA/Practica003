<div class="container text-center">
    <!-- Mensaje de éxito -->
    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <!-- Errores -->
    <ul class="text-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <!-- Título del formulario -->
    <h2 class="mb-4 text-center">
        @if ($accion == 'C') Registrando Horario
        @elseif ($accion == 'E') Editando Horario
        @endif
    </h2>

    <!-- Formulario -->
    <form action="{{ $accion == 'C' ? route('grupohorarios21318.store') : route('grupohorarios21318.update', $grupo_horario->id) }}" method="POST">
        @csrf
        @if ($accion == 'E') @method("PUT") @endif

        <div class="row mb-3">
            <label for="grupo_id" class="col-sm-3 col-form-label">Grupo:</label>
            <div class="col-sm-9">
                <select class="form-select" id="grupo_id" name="grupo_id">
                    <option value="">Seleccione un grupo</option>
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id }}" {{ (old('grupo_id', $grupo_horario->grupo_id ?? '')) == $grupo->id ? 'selected' : '' }}>
                            {{ $grupo->grupo }}
                        </option>
                    @endforeach
                </select>
                @error("grupo_id") <p class="text-danger">Error en: {{ $message }}</p> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="lugar_id" class="col-sm-3 col-form-label">Lugar:</label>
            <div class="col-sm-9">
                <select class="form-select" id="lugar_id" name="lugar_id">
                    <option value="">Seleccione un lugar</option>
                    @foreach ($lugares as $lugar)
                        <option value="{{ $lugar->id }}" {{ (old('lugar_id', $grupo_horario->lugar_id ?? '')) == $lugar->id ? 'selected' : '' }}>
                            {{ $lugar->nombrelugar }}
                        </option>
                    @endforeach
                </select>
                @error("lugar_id") <p class="text-danger">Error en: {{ $message }}</p> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="dia" class="col-sm-3 col-form-label">Día:</label>
            <div class="col-sm-9">
                <select class="form-select" id="dia" name="dia">
                    <option value="">Seleccione un día</option>
                    @foreach (['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'] as $key => $dia)
                        <option value="{{ $key }}" {{ (old('dia', $grupo_horario->dia ?? '')) == $key ? 'selected' : '' }}>
                            {{ $dia }}
                        </option>
                    @endforeach
                </select>
                @error("dia") <p class="text-danger">Error en: {{ $message }}</p> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="hora" class="col-sm-3 col-form-label">Hora:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="hora" name="hora" value="{{ old('hora', $grupo_horario->hora ?? '') }}">
                @error("hora") <p class="text-danger">Error en: {{ $message }}</p> @enderror
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
            <a href="{{ route('grupohorarios21318.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </form>

</div>