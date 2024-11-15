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
        <h2>Registrando Edificio</h2>
        <form action="{{ route('edificios.store') }}" method="POST">
    @elseif ($accion == 'E')
        <h2>Editando Edificio</h2>
        <form action="{{ route('edificios.update', $edificio->id) }}" method="POST">
    @elseif ($accion == 'D')
        <h2>Eliminar Edificio</h2>
        <form action="{{ route('edificios.destroy', $edificio->id) }}" method="POST">
    @endif

    @csrf

    <div class="row mb-3">
        <label for="nombreedificio" class="col-sm-3 col-form-label">Nombre Edificio:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombreedificio" name="nombreedificio" value="{{ old('nombreedificio', $edificio->nombreedificio ?? '') }}" {{ $des }}>
            @error("nombreedificio")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombrecorto" class="col-sm-3 col-form-label">Nombre Corto:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{ old('nombrecorto', $edificio->nombrecorto ?? '') }}" {{ $des }}>
            @error("nombrecorto")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="text-center">
        @if(!empty($txtbtn))
            <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
        @endif
        <a href="{{ route('edificios.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
    </form>
</div>

@endsection
