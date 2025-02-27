@extends('layouts.plant_admin')

@section('titulo')
    Usuarios | Asignar roles
@endsection

@section('contenido')
	@if (Auth::User()->hasAnyPermission(['VIP','CREAR_ROLES','VER_ROLES']))
	<div style="text-align:right">
		<a title="Administrar roles" href="{{ route('roles.index') }}" class="btn btn-info" style="margin: 10px;" ><i class="fas fa-user-cog"></i></a>
	</div>

	@endif

	<div class="offset-3 col-10">
		<div class="card mb-3" style="max-width: 800px;">
			<div class="row g-0">
			<div class="col-md-4">
				<img
				src="{{ asset('images/user.png') }}"
				alt="Imagen de usuario"
				class="img-fluid rounded-start"
				/>
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title">Información de usuario</h5>

						<table class="table table-borderless">
							<tbody>
								<tr>
									<td>Nombre:</td>
									<td>{{ $user->name }}</td>
								</tr>
								<tr>
									<td>Correo:</td>
									<td>{{ $user->email }}</td>
								</tr>
								<tr>
									<td>Status:</td>
									<td>
										@if ($user->active=="true")
											{{ "Activo"}}
										@else
											{{ "Inactivo" }}
										@endif
									</td>
								</tr>
							</tbody>
						</table>
				</div>
			</div>
			</div>
		</div>
	</div>

	@if ($user!=null)
		<form action="{{ route('admin.usuarios.guardar_roles') }}" method="post" style="margin-bottom: 50px;">
			{{ csrf_field() }}
			<table class="table table-striped" id="tabRoles">
			   <thead>
			       <th>ID</th>
			       <th>Nombre</th>
			       <th>Ver permisos</th>
			       <th>Asignar</th>
			   </thead>
			   <tbody>
			   	@foreach ($roles as $rol)
			   		<tr>
			   			<td>{{ $rol->id }}</td>
			   			<td>{{ $rol->name }}</td>
			   			<td class="formulario">
			   				<a href="{{ route('admin.roles.role_ver_permisos',['id'=>$rol->id,'user_id' => $user->id]) }}">
			   					<input type="hidden" name="user_id" value="{{ $user->id }}">
			   					<i class="fas fa-eye"></i>
			   				</a>

			   			</td>
			   			<td>
			   				@if ($rol->user_name!=null)
			   					<label class="control control--checkbox">
			   						<input type="checkbox" name="roles_id[]" value="{{ $rol->id }}" checked>
			   						<div class="control__indicator"></div>
			   					</label>
			   				@else
			   					<label class="control control--checkbox">
			   						<input type="checkbox" name="roles_id[]" value="{{ $rol->id }}">
			   						<div class="control__indicator"></div>
			   					</label>
			   				@endif

			   			</td>
			   		</tr>
			   	@endforeach
			   	@if (count($roles)==0)
			   		<tr>
			   			<td colspan="4">
			   				No se encontraron roles
			   			</td>
			   		</tr>
			   	@endif
			   </tbody>
			</table>
			<input type="submit" name="" value="Asignar" class="btn btn-primary">
		</form>
	@endif

	<div style="margin-bottom: 200px;"></div>
	@section('js')
		<script>
			 //Codigo para adornar las tablas con datatables
             $(document).ready(function() {
                $('#tabRoles').DataTable({

                    dom: 'Bfrtip',

                    responsive: {
                        breakpoints: [
                        {name: 'bigdesktop', width: Infinity},
                        {name: 'meddesktop', width: 1366},
                        {name: 'smalldesktop', width: 1280},
                        {name: 'medium', width: 1188},
                        {name: 'tabletl', width: 1024},
                        {name: 'btwtabllandp', width: 848},
                        {name: 'tabletp', width: 768},
                        {name: 'mobilel', width: 600},
                        {name: 'mobilep', width: 320}
                        ]
                    },

                    lengthMenu: [
                        [ 5, 10, 25, 50, -1 ],
                        [ '5 reg', '10 reg', '25 reg', '50 reg', 'Ver todo' ]
                    ],

                    buttons: [
                        {extend: 'collection', text: 'Exportar',
                            buttons: [
                                { extend: 'copyHtml5', text: 'Copiar' },
                                'excelHtml5',
                                'pdfHtml5',
                                { extend: 'print', text: 'Imprimir' },
                            ]},
                        { extend: 'colvis', text: 'Columnas visibles' },
                        { extend:'pageLength',text:'Ver registros'},
                    ],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                    },

                });
            });
		</script>
	@endsection
@endsection
