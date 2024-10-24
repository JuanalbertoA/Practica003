@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('reticulas.create') }}" class="btn btn-primary">Registrar Retícula</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID Retícula</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha en Vigor</th>
                    <th scope="col">Carrera</th>
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reticulas as $r)
                <tr>
                    <td scope="row">{{ $r->idreticula }}</td>
                    <td>{{ $r->descripcion }}</td>
                    <td>{{ $r->fechaenvigor }}</td>
                    <td>{{ $r->carrera->nombrecarrera }}</td>
                    <td>
                        <a href="{{ route('reticulas.edit', $r->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('reticulas.destroy', $r->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('reticulas.show', $r->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reticulas->links() }} <!-- Para la paginación -->
    </div>
</div>
