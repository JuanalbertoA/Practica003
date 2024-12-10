@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('grupos21318.create') }}" class="btn btn-primary">Registrar Grupo</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Grupo</th>
                    <th scope="col">Periodo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Máximo de Alumnos</th>
                    <th scope="col">Personal</th>
                    <th scope="col">Materia</th>
                    <th scope="col">Periodo</th>
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grupos as $g)
                <tr>
                    <td scope="row">{{ $g->grupo }}</td>
                    <td>{{ $g->periodo->periodo ?? 'Sin asignar' }}</td>
                    <td>{{ $g->fecha }}</td>
                    <td>{{ $g->max_alumnos }}</td>
                    <td>
                        @if($g->personal)
                            {{ $g->personal->nombres }} {{ $g->personal->apellidop }} {{ $g->personal->apellidom }}
                        @else
                            Sin asignar
                        @endif
                    </td>
                    <td>{{ $g->materia_abierta->materia->nombremateria ?? 'Sin asignar' }}</td>
                    <td>{{ $g->periodo->periodo ?? 'Sin asignar' }}</td>
                    <td>
                        <a href="{{ route('grupos21318.edit', $g->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('grupos21318.destroy', $g->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('grupos21318.show', $g->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $grupos->links() }} <!-- Para la paginación -->
    </div>
</div>
