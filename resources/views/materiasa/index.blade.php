@extends("menu2")

@section("contenido2")
<div class="container-fluid py-4">
    <div class="row justify-content-center mb-5">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-gradient-dark">
                    <h3 class="text-center text-black mb-0">Abrir Materias</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('materiasa.index') }}" method="get">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="control-label">Periodo Actual</label>
                                    <select name="idperiodo" class="form-select border-primary" onchange="this.form.submit()">
                                        @foreach ($periodos as $periodo)
                                            <option value="{{ $periodo->id }}" @if($periodo->id == session('periodo_id')) selected @endif>
                                                {{ $periodo->periodo }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="control-label">Carrera</label>
                                    <select name="idcarrera" class="form-select border-primary" onchange="this.form.submit()">
                                        @foreach ($carreras as $carr)
                                            <option value="{{ $carr->id }}" @if($carr->id == session('carrera_id')) selected @endif>
                                                {{ $carr->nombrecarrera }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @for ($semestre = 1; $semestre <= 9; $semestre++)
            @php
                $materiasSemestre = $carrera->flatMap(function ($c) use ($semestre) {
                    return $c->reticulas->flatMap(function ($r) use ($semestre) {
                        return $r->materias->where('semestre', $semestre);
                    });
                });
            @endphp

            <div class="col-md-4 mb-4">
                <div>
                    <div class="bg-gradient-danger text-black">
                        <div class="d-flex align-items-center">
                            <span class="display-6 me-2">{{ $semestre }}</span>
                            <h5 class="mb-0">° Semestre</h5>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        @if ($materiasSemestre->isNotEmpty())
                            <form action="{{ route('materiasa.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="eliminar" value="NOELIMINAR">
                                
                                <div class="materias-list">
                                    @foreach ($materiasSemestre as $materia)
                                        <div class="materia-item">
                                            <div class="form-check custom-checkbox">
                                                <input class="form-check-input border-primary" 
                                                    type="checkbox" 
                                                    name="m{{ $materia->id }}" 
                                                    value="{{ $materia->id }}" 
                                                    onchange="enviar(this)"
                                                    @if ($ma->firstWhere('materia_id', $materia->id)) checked @endif>
                                                <label class="form-check-label ms-2">
                                                    {{ $materia->nombremateria }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </form>
                        @else
                            <div class="text-center text-muted py-4">
                                <p class="mb-0">No hay materias disponibles para este semestre.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>


<script>
function enviar(chbox) {
    chbox.form.eliminar.value = chbox.checked ? "NOELIMINAR" : chbox.value;
    chbox.form.submit();
}
</script>
@endsection