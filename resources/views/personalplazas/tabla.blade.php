@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container my-4">
    <div class="mb-3">
        <a href="{{ route('personalplazas.create') }}" class="btn btn-primary">Registrar Personal Plaza</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo Nombramiento</th>
                    <th scope="col">Plaza</th>
                    <th scope="col">Personal</th>
                    <th scope="col" colspan="3" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personalplazas as $personalplaza)
                <tr>
                    <td scope="row">{{ $personalplaza->id }}</td>
                    <td>{{ $personalplaza->tiponombramiento }}</td>
                    <td>{{ $personalplaza->plaza->nombreplaza ?? 'Sin Plaza' }}</td>
                    <td>{{ $personalplaza->personal->nombres ?? 'Sin Personal' }}</td>
                    <td class="text-center">
                        <a href="{{ route('personalplazas.edit', $personalplaza->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('personalplazas.destroy', $personalplaza->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</button>
                        </form>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('personalplazas.show', ['personalplaza' => $personalplaza->id]) }}" class="btn btn-info btn-sm">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>


        </div>
    </div>
</div>

