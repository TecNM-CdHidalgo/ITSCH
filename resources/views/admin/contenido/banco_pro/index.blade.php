@extends('layouts.plant_admin')

@section('contenido')
    <div class="row">
        <div class="col-sm-3">
            <h6>Banco de proyectos ITSCH</h6>
        </div>
        <div class="col-sm-7"></div>
        <div class="col-sm-2" style="text-align: right">
            <a href="{{ route('admin.contenido.banco.crear') }}" type="button" class="btn btn-sm btn-success"><i class='fas fa-network-wired'></i> Agregar</a>
        </div>
    </div>    
   
    <div class="table-responsive-sm">
        <table class="table table-hover">
            <thead class="table-sm">
                <tr>
                    <th>Carrera</th>
                    <th>Proyecto</th>
                    <th>No. Vacantes</th>
                    <th>Empresa/Institución</th>
                    <th>Dirección</th>
                    <th>Telefono de contacto</th>
                    <th>Correo de contacto</th>
                    <th>Docente responsable</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banco as $ba)
                    <tr>
                        <td>{{ $ba->carrera }}</td>   
                        <td>{{ $ba->proyecto }}</td>
                        <td>{{ $ba->vacantes }}</td>
                        <td>{{ $ba->empresa }}</td>
                        <td>{{ $ba->direccion }}</td>
                        <td>{{ $ba->telefono }}</td>
                        <td>{{ $ba->correo }}</td> 
                        <td>{{ $ba->docente }}</td>   
                        <td>
                            <a href="{{ route('admin.contenido.banco.eliminar',$ba->id) }}" type="button" class="btn btn-sm btn-danger"><i class='fas fa-trash-alt' style='font-size:14px'></i></a>
                            <a href="{{ route('admin.contenido.banco.editar',$ba->id) }}" type="button" class="btn btn-sm btn-warning"><i class='fas fa-pen' style='font-size:14px'></i></a>                            
                        </td>
                    </tr>
                @endforeach			
            </tbody>
        </table>
    </div>	
@endsection