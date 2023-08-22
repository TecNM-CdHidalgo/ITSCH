@extends('layouts.plant_admin')

@section('contenido')
    <h5>Colaborador para el proyecto: {{ $proyecto->proyecto }}</h5>
    <hr>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="{{ route('admin.contenido.banco.storeColaboradores',$proyecto->id) }}" method="get">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del colaborador">
                <label for="tipo">Tipo</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Profesor">Profesor</option>
                    <option value="Alumno">Alumno</option>
                </select>
                <label for="sexo">Sexo</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
                <hr>
                <button type="submit" class="btn btn-primary">Agregar</button>
                <br><br>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
