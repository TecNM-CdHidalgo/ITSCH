@extends('layouts.plant_admin')

@section('titulo')
    Institución | Pases
@endsection

@section('contenido')
    @section('ruta', 'Institución | Pases | Agregar pase')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Agregar pase</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Agregar pase</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pases.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="area">Área de adscripción</label>
                                <select name="area" id="area" class="form-control">
                                    <option value="0">Seleccione un área</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>)
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="departamento">Departamento de trabajo</label>
                                <select name="departamento" id="departamento" class="form-control">
                                    <option value="0">Seleccione un departamento</option>
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>)
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha de la salida</label>
                                <input type="date" name="fecha" id="fecha" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="hora">Hora de salida</label>
                                <input type="time" name="hora" id="hora" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Motivo del pase</label>
                                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection
