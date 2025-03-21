@extends('layouts.plant_admin')

@section('titulo')
    Institución | Pases
@endsection

@section('contenido')
    @section('ruta', 'Institución | Pases | Agregar pase')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">                
                <div class="card col-md-6 mx-auto">
                    <div class="card-header">
                        <h4 class="card-title text-center">Verificar pase</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pases.update', $pase->id) }}" method="POST">
                            @csrf                   
                            <div class="form-group  ">
                                <label for="user_id">Trabajador</label>
                                <input type="text" class="form-control" id="user_id" value="{{ $pase->usuario }}" readonly>
                            </div>
                            <div class="form-group ">
                                <label for="estado">Estado</label>
                                <select class="form-control" id="estado" name="estado">
                                    <option value="pendiente" {{ $pase->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="aprobado" {{ $pase->estado == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                                    <option value="denegado" {{ $pase->estado == 'denegado' ? 'selected' : '' }}>Denegado</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="hora_retorno">Hora de regreso</label>
                                <input type="time" class="form-control" id="hora_retorno" name="hora_retorno" value="{{ $pase->hora_retorno }}" >
                            </div>                              
                            <input type="submit" value="Verificar" class="btn btn-primary"> 
                            <a href="{{ route('pases.index') }}" class="btn btn-secondary">Regresar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection