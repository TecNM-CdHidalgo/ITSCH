@extends('layouts.plant_admin')

@section('titulo','Roles')
@section('ruta', 'Roles')

@section('contenido')


	<div class="row">
		<div class="col"></div>
		<div class="col"></div>
		<div class="col text-right">
			<a href="{{ route('admin.roles.roles_crear')}}" class="btn btn-success" title="Crear rol"><i class="far fa-address-card"></i></a>
		</div>
	</div>


	<br>
	<div class="table-resposive">
		<table class="table" id="tabla_roles">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Ver permisos</th>

						<th>Asignar/Revocar Permisos</th>

				<th>Acción</th>
			</thead>
			<tbody>
				@foreach ($roles as $rol)
					<tr>
						<td>{{ $rol->id }}</td>
						<td>{{ $rol->name }}</td>
						<td>
							<a href="{{ route('admin.roles.role_ver_permisos',$rol->id) }}" title="Ver permisos">Ver</a>
						</td>

							<td>
								<a href="{{ route('admin.roles.roles_asignar_permisos_vista',$rol->id) }}">Asignar/Revocar</a>
							</td>

						<td>

								<a href="{{ route('admin.roles.usuarios',$rol->id) }}" class="btn btn-primary" title="Ver usuarios con este rol"><i class="fas fa-user-tie"></i></a>


								<a href="{{ route('admin.roles.role_editar',[$rol->id]) }}" class="btn btn-warning" title="Editar rol"><i class="far fa-edit"></i></a>


								<a href="{{ route('admin.roles.role_eliminar',$rol->id) }}" onclick="return confirm('¿Estas seguro que deseas eliminarlo?')" class="btn btn-danger" title="Eliminar rol"><i class="far fa-trash-alt"></i></a>

						</td>
					</tr>
				@endforeach
			</tbody>
		 </table>
	</div>

	@section('js')
		<script>
			 //Codigo para adornar las tablas con datatables
             $(document).ready(function() {
                $('#tabla_roles').DataTable({

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
