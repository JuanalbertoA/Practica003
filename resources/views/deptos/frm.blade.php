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
        <h2>Registrando Departamento</h2>
        <form action="{{ route('deptos.store') }}" method="POST">
    @elseif ($accion == 'E')
        <h2>Editando Departamento</h2>
        <form action="{{ route('deptos.update', $depto->id) }}" method="POST">
    @elseif ($accion == 'D')
        <h2>Eliminar Departamento</h2>
        <form action="{{ route('deptos.destroy', $depto->id) }}" method="POST">
    @endif

    @csrf
    <div class="row mb-3">
        <label for="iddepto" class="col-sm-3 col-form-label">ID Departamento:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="iddepto" name="iddepto" value="{{ old('iddepto', $depto->iddepto) }}" {{ $des }}>
            @error("iddepto")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombredepto" class="col-sm-3 col-form-label">Nombre Departamento:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombredepto" name="nombredepto" value="{{ old('nombredepto', $depto->nombredepto) }}" {{ $des }}>
            @error("nombredepto")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombremediano" class="col-sm-3 col-form-label">Nombre Mediano:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombremediano" name="nombremediano" value="{{ old('nombremediano', $depto->nombremediano) }}" {{ $des }}>
            @error("nombremediano")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombrecorto" class="col-sm-3 col-form-label">Nombre Corto:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{ old('nombrecorto', $depto->nombrecorto) }}" {{ $des }}>
            @error("nombrecorto")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="text-center">
        @if(!empty($txtbtn))
            <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
        @endif
        <a href="{{ route('deptos.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
    </form>
</div>

@endsection
