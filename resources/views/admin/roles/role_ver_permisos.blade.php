@extends('layouts.plant_admin')

@section('titulo','Ver permisos')
@section('ruta', 'Roles|Ver permisos')

@section('contenido')
	<a href="{{ route('admin.roles.index') }}" title="Regresar" class="btn btn-info"><i class="far fa-arrow-alt-circle-left"></i></a>
	<a href="{{ route('admin.roles.roles_asignar_permisos_vista',$role->id) }}" class="btn btn-success" title="Agregar permisos"><i class="fas fa-plus"></i></a>

	<table class="table table-striped">
	    <!-- instancia al archivo table, dentro de este mismo direcctorio -->
	   <thead>
	       <th>ID</th>
	       <th>Nombre</th>
	   </thead>
	   <tbody>
	   	@foreach ($permisos as $per)
	   		<tr>
	   			<td>{{ $per->id }}</td>
	   			<td>{{ $per->name }}</td>
	   		</tr>
	   	@endforeach
	   </tbody>
	</table>
@endsection
