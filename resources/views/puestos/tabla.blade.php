@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('puestos.create') }}" class="btn btn-primary">Registrar Puesto</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID Puesto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puestos as $puesto)
                <tr>
                    <td scope="row">{{ $puesto->idpuesto }}</td>
                    <td>{{ $puesto->nombre }}</td>
                    <td>{{ $puesto->tipo }}</td>
                    <td>
                        <a href="{{ route('puestos.edit', $puesto->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('puestos.destroy', $puesto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('puestos.show', $puesto->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $puestos->links() }}
    </div>
</div>
