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
        <h2>Registrando Hora</h2>
        <form action="{{ route('horas.store') }}" method="POST">
    @elseif ($accion == 'E')
        <h2>Editando Hora</h2>
        <form action="{{ route('horas.update', $hora->id) }}" method="POST">
    @elseif ($accion == 'D')
        <h2>Eliminar Hora</h2>
        <form action="{{ route('horas.destroy', $hora->id) }}" method="POST">
    @endif

    @csrf

    <div class="row mb-3">
        <label for="hora_ini" class="col-sm-3 col-form-label">Hora Inicio:</label>
        <div class="col-sm-9">
            <input type="time" class="form-control" id="hora_ini" name="hora_ini" value="{{ old('hora_ini', $hora->hora_ini ?? '') }}" {{ $des }}>
            @error("hora_ini")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="hora_fin" class="col-sm-3 col-form-label">Hora Fin:</label>
        <div class="col-sm-9">
            <input type="time" class="form-control" id="hora_fin" name="hora_fin" value="{{ old('hora_fin', $hora->hora_fin ?? '') }}" {{ $des }}>
            @error("hora_fin")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="text-center">
        @if(!empty($txtbtn))
            <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
        @endif
        <a href="{{ route('horas.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
    </form>
</div>

@endsection
