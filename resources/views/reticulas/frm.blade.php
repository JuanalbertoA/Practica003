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
        <h2>Registrando Retícula</h2>
        <form action="{{ route('reticulas.store') }}" method="POST">
    @elseif ($accion == 'E')
        <h2>Editando Retícula</h2>
        <form action="{{ route('reticulas.update', $reticula->id) }}" method="POST">
    @elseif ($accion == 'D')
        <h2>Eliminar Retícula</h2>
        <form action="{{ route('reticulas.destroy', $reticula->id) }}" method="POST">
    @endif

    @csrf

    <div class="row mb-3">
        <label for="idreticula" class="col-sm-3 col-form-label">ID Retícula:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="idreticula" name="idreticula" value="{{ old('idreticula', $reticula->idreticula) }}" {{$des}}>
            @error("idreticula")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="descripcion" class="col-sm-3 col-form-label">Descripción:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $reticula->descripcion) }}" {{$des}}>
            @error("descripcion")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="fechaenvigor" class="col-sm-3 col-form-label">Fecha en Vigor:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="fechaenvigor" name="fechaenvigor" value="{{ old('fechaenvigor', $reticula->fechaenvigor) }}" {{$des}}>
            @error("fechaenvigor")
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
                    <option value="{{ $carrera->id }}" {{ (old('carrera_id', $reticula->carrera_id) == $carrera->id) ? 'selected' : '' }}>
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
        <a href="{{ route('reticulas.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
    </form>
</div>

@endsection
