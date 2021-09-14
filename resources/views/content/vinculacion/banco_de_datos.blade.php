@extends('layouts.app')

@section('content')
	<h3>Banco de proyectos ITSCH</h3>
	<hr>
	<div class="table-responsive-sm">
        <table class="table table-hover">
            <thead class="table-sm">
                <tr>
                    <th>Carrera</th>
                    <th>Proyecto</th>
                    <th>No. Integrantes</th>
                    <th>Empresa/Institución</th>
                    <th>Dirección</th>
                    <th>Telefono de contacto</th>
                    <th>Correo de contacto</th>
                    <th>Docente responsable</th>
                    <th>Fecha inicio</th>
                    <th>Status</th>
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
                        <td>{{ $ba->inicio }}</td>
                        <td>
                            @if ($ba->status==1)
                                <p class="bg-success text-white">Inicio</p>
                            @elseif ($ba->status==2)
                                <p class="bg-warning text-white">En proceso</p>
                            @elseif ($ba->status==3)
                                <p class="bg-danger text-white">Terminado</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

