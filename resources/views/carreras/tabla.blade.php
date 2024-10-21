@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('carreras.create') }}" class="btn btn-primary">Registrar Carrera</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID Carrera</th>
                    <th scope="col">Nombre Carrera</th>
                    <th scope="col">Nombre Mediano</th>
                    <th scope="col">Nombre Corto</th>
                    <th scope="col">Departamento</th>
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carreras as $c)
                <tr>
                    <td scope="row">{{ $c->idcarrera }}</td>
                    <td>{{ $c->nombrecarrera }}</td>
                    <td>{{ $c->nombremediano }}</td>
                    <td>{{ $c->nombrecorto }}</td>
                    <td>{{ $c->depto->nombredepto }}</td>
                    <td>
                        <a href="{{ route('carreras.edit', $c->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('carreras.destroy', $c->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('carreras.show', $c->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $carreras->links() }} <!-- Para la paginación -->
    </div>
</div>
