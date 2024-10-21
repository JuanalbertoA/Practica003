@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('deptos.create') }}" class="btn btn-primary">Registrar Departamento</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID Departamento</th>
                    <th scope="col">Nombre Departamento</th>
                    <th scope="col">Nombre Mediano</th>
                    <th scope="col">Nombre Corto</th>
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deptos as $d)
                <tr>
                    <td scope="row">{{ $d->iddepto }}</td>
                    <td>{{ $d->nombredepto }}</td>
                    <td>{{ $d->nombremediano }}</td>
                    <td>{{ $d->nombrecorto }}</td>
                    <td>
                        <a href="{{ route('deptos.edit', $d->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('deptos.destroy', $d->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('deptos.show', $d->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $deptos->links() }}
    </div>
</div>
