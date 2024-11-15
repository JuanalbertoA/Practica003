@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('horas.create') }}" class="btn btn-primary">Registrar Hora</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Hora Inicio</th>
                    <th scope="col">Hora Fin</th>
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horas as $hora)
                <tr>
                    <td scope="row">{{ $hora->id }}</td>
                    <td>{{ $hora->hora_ini }}</td>
                    <td>{{ $hora->hora_fin }}</td>
                    <td>
                        <a href="{{ route('horas.edit', $hora->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('horas.destroy', $hora->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('horas.show', $hora->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $horas->links() }} <!-- Para la paginación -->
    </div>
</div>

