@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('materias.create') }}" class="btn btn-primary">Registrar Materia</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID Materia</th> <!-- Cambié a 'idmateria' -->
                    <th scope="col">Nombre de la Materia</th> <!-- nombremateria -->
                    <th scope="col">Nivel</th> <!-- nivel -->
                    <th scope="col">Nombre Mediano</th> <!-- nombremediano -->
                    <th scope="col">Nombre Corto</th> <!-- nombrecorto -->
                    <th scope="col">Modalidad</th> <!-- modalidad -->
                    <th scope="col">Retícula</th> <!-- reticula_id -->
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materias as $m)
                <tr>
                    <td scope="row">{{ $m->idmateria }}</td> <!-- Mostrar 'idmateria' -->
                    <td>{{ $m->nombremateria }}</td> <!-- Mostrar 'nombremateria' -->
                    <td>{{ $m->nivel }}</td> <!-- Mostrar 'nivel' -->
                    <td>{{ $m->nombremediano }}</td> <!-- Mostrar 'nombremediano' -->
                    <td>{{ $m->nombrecorto }}</td> <!-- Mostrar 'nombrecorto' -->
                    <td>{{ $m->modalidad }}</td> <!-- Mostrar 'modalidad' -->
                    <td>{{ $m->reticula->descripcion }}</td> <!-- Mostrar la relación con Retícula -->
                    <td>
                        <a href="{{ route('materias.edit', $m->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('materias.destroy', $m->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('materias.show', $m->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $materias->links() }} <!-- Paginación -->
    </div>
</div>
