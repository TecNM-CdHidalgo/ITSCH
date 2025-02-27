@extends('layouts.plant_admin')

@section('contenido')
		@if ($role!=null)
			<h4>Rol: {{ "$role->name" }}</h4>
			<br>
			<div class="resetear" style="padding: 5px;"></div>
			<input type="hidden" name="role_id" value="{{ $role->id }}" id="role_id">
		@endif

		<table class="table table-striped table-bordered" id="tabla_permisos">
		    <!-- instancia al archivo table, dentro de este mismo direcctorio -->
		   <thead>
		       <th>ID</th>
		       <th>Nombre</th>
		       <th>Asignado</th>
		       <th>Asignar</th>
		   </thead>
		   <tbody>
		   	@if ($permisos!=null && $role!=null)
		   		@foreach ($permisos as $per)
			   		<tr>
			   			<td>{{ $per->id }}</td>
			   			<td>{{ $per->name }}</td>
			   			<td>
			   				@if ($per->role_id!=null)
			   					{{ "SI"}}
			   				@else
			   					{{ "NO" }}
			   				@endif
			   			</td>
			   			<td>
			   				@if ($per->role_id!=null)
			   					<label class="control control--checkbox">
			   						<input type="checkbox" name="permisos_id[]" value="{{ $per->id}}" class="permisos_asignados" id="c{{ $per->id }}" checked>
			   						<div class="control__indicator"></div>
			   					</label>
			   				@else
			   					<label class="control control--checkbox">
			   						<input type="checkbox" name="permisos_id[]" value="{{ $per->id}}" class="permisos_asignados" id="c{{ $per->id }}" >
			   						<div class="control__indicator" style=""></div>
			   					</label>
			   				@endif
			   			</td>
			   		</tr>
			   	@endforeach
		   	@endif
		   </tbody>
		</table>
		<hr>
		<a href="#" id="permisos-submit" class="btn btn-primary">Guardar</a>
		<div style="margin-bottom: 50px;"></div>
		@section('js')

			<script type="text/javascript">
				var permisos_id = [];
				function inicializarArreglo(){
					var lista_permisos_ya_asignados = document.getElementsByClassName('permisos_asignados');
					for (var i = 0; i < lista_permisos_ya_asignados.length; i++) {
						if(lista_permisos_ya_asignados[i].checked){
							permisos_id.push(lista_permisos_ya_asignados[i].value);
						}
					}
				}
				function agregarPermisosArreglo(){
					$(document).on('click','.permisos_asignados',function(event){
						var checkbox_id = $(this).attr('id');
						var checkbox = document.getElementById(checkbox_id);
						if(checkbox.checked){
							permisos_id.push($(this).attr('value'));
						}else{
							for (var i = 0; i < permisos_id.length; i++) {
								if(permisos_id[i]==$(this).attr('value')){
									permisos_id.splice(i,1);
									break;
								}
							}
						}
					});
				}

				function agregarPermisosAjax(){
					$('#permisos-submit').click(function(event){
						event.preventDefault();
                        console.log('permisos_id',permisos_id);
						role_id = $('#role_id').attr('value');
						$.ajax({
							type: "post",
							dataType: "json",
							url:"{{ route('admin.roles.roles_asignar_permisos') }}",
							data:{
                                _token: "{{ csrf_token() }}",
								permisos_id:permisos_id,
								role_id:role_id
							},
							success: function(response){
                                 //Mostramos un mensaje en sweetalert2
                                 Swal.fire({
                                    title: 'Permisos asignados',
                                    text: response.mensaje,
                                    icon: 'success',
                                    confirmButtonText: 'Aceptar'
                                });
                                // Esperamos 2 segundos y redireccionamos a la vista de roles
                                setTimeout(function(){
                                    window.location.href = "{{ route('admin.roles.index') }}";
                                }, 2000);
							},error: function(e){
								console.log('Error a agregar permisos',e);
							}
						});
					});
				}

				$(document).ready(function(){
					inicializarArreglo();
					$('#tabla_permisos').DataTable({
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
							[ 7, 10, 25, 50, -1 ],
							[ '7 reg', '10 reg', '25 reg', '50 reg', 'Ver todo' ]
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

					agregarPermisosArreglo();
					agregarPermisosAjax();
				});
			</script>
		@endsection
@endsection
