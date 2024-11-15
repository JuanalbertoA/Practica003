@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('lugares.create') }}" class="btn btn-primary">Registrar Lugar</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre Lugar</th>
                    <th scope="col">Nombre Corto</th>
                    <th scope="col">Edificio</th>
                    <th scope="col" colspan="3" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lugares as $lugar)
                <tr>
                    <td scope="row">{{ $lugar->id }}</td>
                    <td>{{ $lugar->nombrelugar }}</td>
                    <td>{{ $lugar->nombrecorto }}</td>
                    <td>{{ $lugar->edificio->nombreedificio ?? 'Sin asignar' }}</td>
                    <td>
                        <a href="{{ route('lugares.edit', $lugar->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('lugares.destroy', $lugar->id) }}" method="POST" style="display:inline;" 
                              onsubmit="return confirm('¿Estás seguro de que deseas eliminar este lugar?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('lugares.show', $lugar->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $lugares->links() }} <!-- Para la paginación -->
        </div>
    </div>
</div>
