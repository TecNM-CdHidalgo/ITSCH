@extends('layouts.plant_admin')

@section('contenido')
<h4><a href="{{ route('carreras.index') }}"> Carreras/</a>Inicialización</h4>
<hr>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <form action="{{ route('carreras.inicializar') }}">
            <label for="nombre">Nombre de la carrera</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escribe el nombre de la carrera inicial">
            <br>
            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
            <br>
            <br>
        </form>
    </div>
    <div class="col-sm-2"></div>
</div>
@endsection
