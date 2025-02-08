@extends('layouts.plant_admin')

@section('titulo')
    Institución | Adeudos | Eliminar todos los adeudos
@endsection

@section('contenido')
    @section('ruta', 'Institución | Eliminar todos los adeudos')
    <div class="container">
        <div class="row">
            <div class="col-md-12">  
                {{-- seleccionamos las fechas de los adeudos que se quieran eliminar --}}
                <form action="{{ route('adeudos.destroyAll') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de inicio</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha de fin</label>
                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>   
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                        <a href="{{ route('adeudos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
                {{-- Mostramos todos los registros de adeudos --}}
                <table class="table table-sm" id="T-adeudos">
                    <thead>
                        <tr>
                            <th>Control</th>                           
                            <th>Alumno</th>
                            <th>Carrera</th>
                            <th>Status</th>
                            <th>Concepto</th>
                            <th>Fecha de adeudo</th>                  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adeudos as $adeudo)
                            <tr>
                                <td>{{ $adeudo->control }}</td>                                
                                <td>
                                    {{ $adeudo->alumno?->alu_Nombre ?? 'No encontrado' }}
                                    {{ $adeudo->alumno?->alu_ApePaterno ?? '' }}
                                    {{ $adeudo->alumno?->alu_ApeMaterno ?? '' }}
                                </td>
                                <td>{{ $adeudo->carrera }}</td>
                                <td>
                                    @switch($adeudo->alumno?->alu_StatusAct)
                                        @case('BD')
                                            Baja definitiva
                                            @break

                                        @case('VI')
                                            Vigente
                                            @break

                                        @case('BT')
                                            Baja temporal
                                            @break

                                        @default
                                            Estado desconocido
                                    @endswitch
                                </td>
                                <td>{{ $adeudo->concepto }}</td>
                                <td>{{ $adeudo->fecha_adeudo }}</td>                     
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
@endsection