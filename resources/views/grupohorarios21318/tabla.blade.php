@if(session('mensaje'))
    <div class="alert alert-info text-center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container"><br>
    <div class="mb-3">
        <a href="{{ route('grupohorarios21318.create') }}" class="btn btn-primary">Registrar Horario</a>
    </div>

    <div class="table-responsive-md">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Grupo</th>
                    <th scope="col">Lugar</th>
                    <th scope="col">Día</th>
                    <th scope="col">Hora</th>
                    <th scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grupo_horarios as $horario)
                <tr>
                    <td scope="row">{{ $horario->grupo->grupo ?? 'Sin asignar' }}</td>
                    <td>{{ $horario->lugar->nombrelugar ?? 'Sin asignar' }}</td>
                    <td>{{ ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'][$horario->dia] }}</td>
                    <td>{{ $horario->hora }}</td>
                    <td>
                        <a href="{{ route('grupohorarios21318.edit', $horario->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('grupohorarios21318.destroy', $horario->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $grupo_horarios->links() }} <!-- Para la paginación -->
    </div>
</div>
