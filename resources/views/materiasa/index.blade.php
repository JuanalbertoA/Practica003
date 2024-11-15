@extends("menu2")

@section("contenido1")
<div class="row">
    <div class="col-10">
        <h3>Apertura de Materias</h3>
    </div>
    
    <div class="col-8">
        <select name="idperiodo" id="idperiodo">
            @foreach ($periodos as $periodo)
            <option value="{{$periodo->id}}">{{$periodo->fechaini}}</option>
            @endforeach
        </select><br>
        <select name="idcarrera" id="idcarrera">
            <option value="1">ISC</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col">
        <button>Sem 1</button><br>
        <input type="checkbox" name="m1" id="m1">Mat 1<br>
        <input type="checkbox" name="m2" id="m2">Mat 2<br>
        <input type="checkbox" name="m3" id="m3">Mat 3<br>
        <input type="checkbox" name="m4" id="m4">Mat 4<br>
        <input type="checkbox" name="m5" id="m5">Mat 5<br>
    </div>
</div>
<div class="col">
    <button>Sem 2</button><br>
    <input type="checkbox" name="m1" id="m1">Pro 1<br>
    <input type="checkbox" name="m2" id="m2">Pro 2<br>
    <input type="checkbox" name="m3" id="m3">Pro 3<br>
    <input type="checkbox" name="m4" id="m4">Pro 4<br>
    <input type="checkbox" name="m5" id="m5">Pro 5<br>
</div>
<div class="col">
    <button>Sem 3</button><br>
    <input type="checkbox" name="m1" id="m1">Pro 1<br>
    <input type="checkbox" name="m2" id="m2">Pro 2<br>
    <input type="checkbox" name="m3" id="m3">Pro 3<br>
    <input type="checkbox" name="m4" id="m4">Pro 4<br>
    <input type="checkbox" name="m5" id="m5">Pro 5<br>
</div>

@endsection