@extends("menu2")

@section("contenido2")

<div class="container text-center">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    @if ($accion == 'C')
        <h2>Registrando Personal Plaza</h2>
        <form action="{{ route('personalplazas.store') }}" method="POST">
    @elseif ($accion == 'E')
        <h2>Editando Personal Plaza</h2>
        <form action="{{ route('personalplazas.update', $personalplaza->id) }}" method="POST">
            @method('PUT')
    @elseif ($accion == 'D')
        <h2>Detalles de Personal Plaza</h2>
        <form action="{{ route('personalplazas.destroy', $personalplaza->id) }}" method="POST">
            @method('DELETE')
    @endif

    @csrf

    <div class="row mb-3">
        <label for="tiponombramiento" class="col-sm-3 col-form-label">Tipo Nombramiento:</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" id="tiponombramiento" name="tiponombramiento" 
                   value="{{ old('tiponombramiento', $personalplaza->tiponombramiento ?? '') }}" 
                   @if ($accion == 'D') disabled @endif>
            @error("tiponombramiento")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="plaza_id" class="col-sm-3 col-form-label">Plaza:</label>
        <div class="col-sm-9">
            <select id="plaza_id" name="plaza_id" class="form-select" @if ($accion == 'D') disabled @endif>
                <option value="">Seleccionar Plaza</option>
                @foreach ($plazas as $plaza)
                    <option value="{{ $plaza->id }}" 
                        {{ old('plaza_id', $personalplaza->plaza_id ?? '') == $plaza->id ? 'selected' : '' }}>
                        {{ $plaza->nombreplaza }}
                    </option>
                @endforeach
            </select>
            @error("plaza_id")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <label for="personal_id" class="col-sm-3 col-form-label">Personal:</label>
        <div class="col-sm-9">
            <select id="personal_id" name="personal_id" class="form-select" @if ($accion == 'D') disabled @endif>
                <option value="">Seleccionar Personal</option>
                @foreach ($personals as $personal)
                    <option value="{{ $personal->id }}" 
                        {{ old('personal_id', $personalplaza->personal_id ?? '') == $personal->id ? 'selected' : '' }}>
                        {{ $personal->nombres }} {{ $personal->apellidop }} {{ $personal->apellidom }}
                    </option>
                @endforeach
            </select>
            @error("personal_id")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            @if ($accion == 'C')
                <button type="submit" class="btn btn-primary">Crear</button>
            @elseif ($accion == 'E')
                <button type="submit" class="btn btn-primary">Editar</button>
            @elseif ($accion == 'D')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            @endif
        </div>
    </div>

</form>
</div>

@endsection
