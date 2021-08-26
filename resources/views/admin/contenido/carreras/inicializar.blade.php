@extends('layouts.plant_admin')

@section('contenido')
<h4><a href="{{ route('carreras.index') }}"> Carreras/</a>Inicialización</h4>
<hr>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <form action="{{ route('carreras.inicializar') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <label for="nombre">Nombre de la carrera</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escribe el nombre de la carrera inicial">
            <hr>
            <label for="nom_esp">Nombre de la especialidad</label>
            <input type="text" class="form-control" name="nom_esp" id="nom_esp" placeholder="Escribe el nombre de la especialidad">
            <br>
            <label for="cla_esp">Clave de la especialidad</label>
            <input type="text" class="form-control" name="cla_esp" id="cla_esp" placeholder="Escribe la clave de la especialidad">
            <br>
            <label for="obj_esp">Objetivo de la especialidad</label>
            <textarea class="form-control" rows="5" name="obj_esp" id="obj_esp" placeholder="Escribe el objetivo de la especialidad"></textarea>
            <br>
            <label for="reticula">Formato de la retícula completa de la especialidad</label>
            <input type="file" name="reticula" id="reticula" class="form-control-file border">
            <br>
            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
            <br>
            <br>
        </form>
    </div>
    <div class="col-sm-2"></div>
</div>
@endsection
