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
                        <h4 class="card-title">Agregar pase</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pases.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="area_id">Área de adscripción</label>
                                <select name="area_id" id="area_id" class="form-control" required>
                                    <option value="0">Seleccione un área</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>)
                                    @endforeach
                                </select>
                            </div>   
                            <div class="form-group  ">
                                <label for="nombre">Nombre del jefe</label>
                                <select name="jefe_id" id="jefe_id" class="form-control" required>
                                <option value="0">Selecciona tu jefe</option>
                                    @foreach ($jefes as $jefe)
                                        <option value="{{ $jefe->id }}">{{ $jefe->name }}</option>
                                    @endforeach
                                </select>
                            </div>                        
                            <div class="form-group">
                                <label for="fecha">Fecha de la salida</label>
                                <input type="date" name="fecha_solicitud" id="fecha_solicitud" class="form-control" required value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="form-group">
                                <label for="hora">Hora de salida</label>
                                <input type="time" name="hora_salida" id="hora_salida" class="form-control" required value="{{ date('H:i') }}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion" >Razones detalladas (Minimo 3 palabras)</label>
                                <textarea name="motivo" id="motivo" class="form-control" required></textarea>
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
