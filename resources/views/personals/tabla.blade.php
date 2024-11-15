@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('personals.create') }}" class="btn btn-primary">Registrar Personal</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">RFC</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Licenciatura</th>
                    <th scope="col">Especialización</th>
                    <th scope="col">Maestría</th>
                    <th scope="col">Doctorado</th>
                    <th scope="col" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personals as $personal)
                <tr>
                    <td scope="row">{{ $personal->id }}</td>
                    <td>{{ $personal->RFC }}</td>
                    <td>{{ $personal->nombres }}</td>
                    <td>{{ $personal->apellidop }}</td>
                    <td>{{ $personal->apellidom }}</td>
                    <td>{{ $personal->licenciatura }}</td>
                    <td>{{ $personal->especializacion }}</td>
                    <td>{{ $personal->maestria }}</td>
                    <td>{{ $personal->doctorado }}</td>
                    <td>
                        <a href="{{ route('personals.edit', $personal->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('personals.destroy', $personal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('personals.show', $personal->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $personals->links() }} <!-- Para la paginación -->
    </div>
</div>
