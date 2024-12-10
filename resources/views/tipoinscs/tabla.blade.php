@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('tipoinscs.create') }}" class="btn btn-primary">Registrar Tipo de Inscripción</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Periodo</th>
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipoinscs as $tipoinsc)
                <tr>
                    <td scope="row">{{ $tipoinsc->id }}</td>
                    <td>{{ $tipoinsc->tipo }}</td>
                    <td>{{ $tipoinsc->fecha }}</td>
                    <td>{{ $tipoinsc->periodo->periodo ?? 'Sin asignar' }}</td>
                    <td>
                        <a href="{{ route('tipoinscs.edit', $tipoinsc->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('tipoinscs.destroy', $tipoinsc->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('tipoinscs.show', $tipoinsc->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tipoinscs->links() }} <!-- Para la paginación -->
    </div>
</div>

