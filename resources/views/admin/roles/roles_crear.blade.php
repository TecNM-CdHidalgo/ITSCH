@extends('layouts.plant_admin')

@section('contenido')
	<form action="{{ route('admin.roles.roles_guardar') }}" method="post">
		@csrf
		<div class="form-outline">
			<input type="text" id="name" name="name" class="form-control form-control-lg" required />
			<label class="form-label" for="password">Nombre</label>
		</div>
		<br>
		<button type="submit" class="btn btn-primary">Agregar</button>
	</form>
@endsection
