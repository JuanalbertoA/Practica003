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
        <h2>Registrando Puesto</h2>
        <form action="{{ route('puestos.store') }}" method="POST">
    @elseif ($accion == 'E')
        <h2>Editando Puesto</h2>
        <form action="{{ route('puestos.update', $puesto->id) }}" method="POST">
    @elseif ($accion == 'D')
        <h2>Eliminar Puesto</h2>
        <form action="{{ route('puestos.destroy', $puesto->id) }}" method="POST">
    @endif

    @csrf
    <div class="row mb-3">
        <label for="idpuesto" class="col-sm-3 col-form-label">ID Puesto:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="idpuesto" name="idpuesto" value="{{ old('idpuesto', $puesto->idpuesto) }}" {{ $des }}>
            @error("idpuesto")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $puesto->nombre) }}" {{ $des }}>
            @error("nombre")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="tipo" class="col-sm-3 col-form-label">Tipo:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo', $puesto->tipo) }}" {{ $des }}>
            @error("tipo")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="text-center">
        @if(!empty($txtbtn))
            <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
        @endif
        <a href="{{ route('puestos.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
    </form>
</div>

@endsection
