@extends('layouts.plant_admin')

@section('contenido')
	<table class="table table-striped" id="tabla_roles">
	   <thead>
	       <th>Nombre</th>
	       <th>Correo</th>
	       <th>Area</th>
	       <th>Activo</th>
	       <th>Acción</th>
	   </thead>
	   <tbody>
	   	@foreach ($users as $user)
	   		<tr>
	   			<td>{{ $user->name }}</td>
	   			<td>{{ $user->email }}</td>
	   			<td>{{ $user->area }}</td>
	   			<td>
	   				@if ($user->active=="true")
	   					{{ "SI" }}
	   				@else
						{{ "NO" }}
	   				@endif
	   			</td>
	   			<td>
	   				<a href="{{ route('admin.roles.usuarios_revocar',['id' => $role->id,'user_id' => $user->id]) }}" onclick="return confirm('¿Estas seguro que deseas eliminarlo?')" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
	   			</td>
	   		</tr>
	   	@endforeach
	   </tbody>
	</table>
	<div style="margin-bottom: 50px;"></div>
	@section('js')
		<script type="text/javascript">

			$(document).ready(function(){
				$('#tabla_roles').DataTable({
					"pagingType":"full_numbers"
				});
			});
		</script>
	@endsection
@endsection
