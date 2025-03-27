@extends('layouts.plant_admin')

@section('titulo')
    Institución | Pases | Modificar
@endsection

@section('contenido')
    @section('ruta', 'Institución | Pases | Modificar')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">                
                <div class="card col-md-6 mx-auto">
                    <div class="card-header">
                        <h4 class="card-title">Modificar pase</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pases.update', $pase->id) }}" method="POST">
                            @csrf                   
                            <div class="form-group ">
                                <label for="area_id">Área de adscripción</label>
                                <select name="area_id" id="area_id" class="form-control">
                                    <option value="0">Seleccione un área</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}" @if ($area->id == $pase->area_id) selected @endif>{{ $area->nombre }}</option>)
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group ">
                                <label for="usuario">Trabajador</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $pase->usuario }}">
                            </div>
                            <div class="form-group ">
                                <label for="jefe">Jefe</label>
                                <select name="jefe_id" id="jefe_id" class="form-control">
                                    <option value="0">Seleccione un jefe</option>
                                    @foreach ($jefes as $jefe)
                                        <option value="{{ $jefe->id }}" @if ($jefe->id == $pase->jefe_id) selected @endif>{{ $jefe->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="fecha_solicitud">Fecha de solicitud</label>
                                <input type="date" class="form-control" id="fecha_solicitud" name="fecha_solicitud" value="{{ $pase->fecha_solicitud }}" >
                            </div>
                            <div class="form-group ">
                                <label for="fecha_respuesta">Hora de salida</label>
                                <input type="time" class="form-control" id="hora_salida" name="hora_salida" value="{{ $pase->hora_salida }}" >
                            </div>
                            {{-- La hora de regreso solo el jefe la puede modificar --}}
                            @if (auth()->user()->hasAnyPermission(['verificar_pases', 'VIP']) || auth()->user()->id == $pase->jefe_id)                              
                                <div class="form-group ">
                                    <label for="fecha_respuesta">Hora de regreso</label>
                                    <input type="time" class="form-control" id="hora_retorno" name="hora_retorno" value="{{ $pase->hora_retorno }}" >
                                </div>
                            @endif
                            <div class="form-group ">
                                <label for="fecha_respuesta">Razones detalladas (Minimo 3 palabras)</label>
                                <input type="text" class="form-control" id="motivo" name="motivo" value="{{ $pase->motivo }}" >
                            </div>
                            @if (auth()->user()->hasAnyPermission(['verificar_pases', 'VIP']) || auth()->user()->id == $pase->jefe_id)  
                                <div class="form-group ">
                                    <label for="estado">Estado</label>
                                    <select class="form-control" id="estado" name="estado">
                                        <option value="pendiente" {{ $pase->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="aprobado" {{ $pase->estado == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                                        <option value="denegado" {{ $pase->estado == 'denegado' ? 'selected' : '' }}>Denegado</option>
                                    </select>
                                </div>  
                            @endif
                            <div class="form-group ">
                                <input type="submit" value="Guardar" class="btn btn-primary">
                                <a href="{{ route('pases.index') }}" class="btn btn-secondary">Cancelar</a>
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

@section('js')
    <script>
        // Funcion para vlidadar que minimo se introduzcan 3 palabras en el campo motivo
        $(document).ready(function() {
            $('#motivo').on('blur', function() {
                var palabras = $('#motivo').val().split(' ');
                if (palabras.length < 3) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Debes introducir al menos 3 palabras en el campo motivo',
                    });
                    $('#motivo').val('');
                }
            });
        });       
    </script>
@endsection