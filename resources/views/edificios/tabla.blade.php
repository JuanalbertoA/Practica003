@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('edificios.create') }}" class="btn btn-primary">Registrar Edificio</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre Edificio</th>
                    <th scope="col">Nombre Corto</th>
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($edificios as $edificio)
                <tr>
                    <td scope="row">{{ $edificio->id }}</td>
                    <td>{{ $edificio->nombreedificio }}</td>
                    <td>{{ $edificio->nombrecorto }}</td>
                    <td>
                        <a href="{{ route('edificios.edit', $edificio->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('edificios.destroy', $edificio->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('edificios.show', $edificio->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $edificios->links() }} <!-- Para la paginación -->
    </div>
</div>
