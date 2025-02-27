@extends('layouts.plant_admin')

@section('contenido')
	<form action="{{ route('admin.roles.role_actualizar',$role->id) }}" method="post">
		@csrf
		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" name="name" id="name" class="form-control" required placeholder="Nombre del rol" value="{{ $role->name }}">
		</div>
		<hr>
		<input type="submit" value="Guardar" class="btn btn-info">
	</form>
@endsection
