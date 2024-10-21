@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('alumnos.create') }}" class="btn btn-primary">Registrar Alumno</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Número de Control</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Carrera</th>
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $a)
                <tr>
                    <td scope="row">{{ $a->noctrl }}</td>
                    <td>{{ $a->nombre }}</td>
                    <td>{{ $a->apellidop }}</td>
                    <td>{{ $a->apellidom }}</td>
                    <td>{{ $a->sexo == 'M' ? 'Masculino' : 'Femenino' }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->carrera->nombrecarrera }}</td>
                    <td>
                        <a href="{{ route('alumnos.edit', $a->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('alumnos.destroy', $a->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('alumnos.show', $a->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $alumnos->links() }} <!-- Para la paginación -->
    </div>
</div>
