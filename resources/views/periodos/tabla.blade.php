@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('periodos.create') }}" class="btn btn-primary">Registrar Periodo</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID Periodo</th>
                    <th scope="col">Periodo</th>
                    <th scope="col">Descripción Corta</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periodos as $periodo)
                <tr>
                    <td scope="row">{{ $periodo->idperiodo }}</td>
                    <td>{{ $periodo->periodo }}</td>
                    <td>{{ $periodo->desccorta }}</td>
                    <td>{{ $periodo->fechaini }}</td>
                    <td>{{ $periodo->fechafin }}</td>
                    <td>
                        <a href="{{ route('periodos.edit', $periodo->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('periodos.destroy', $periodo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('periodos.show', $periodo->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $periodos->links() }} <!-- Para la paginación -->
    </div>
</div>
