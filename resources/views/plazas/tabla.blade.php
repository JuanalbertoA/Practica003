@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('plazas.create') }}" class="btn btn-primary">Registrar Plaza</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID Plaza</th>
                    <th scope="col">Nombre Plaza</th>
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plazas as $plaza)
                <tr>
                    <td scope="row">{{ $plaza->idplaza }}</td>
                    <td>{{ $plaza->nombreplaza }}</td>
                    <td>
                        <a href="{{ route('plazas.edit', $plaza->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('plazas.destroy', $plaza->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('plazas.show', $plaza->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $plazas->links() }}
    </div>
</div>
