@extends('layouts.plant_admin')

@section('titulo')
    Usuarios
@endsection
@section('contenido')
  <a href="{{ route('admin.usuarios.crear')}}" class="btn btn-primary float-right mb-2" data-toggle="tooltip" data-replacement="top" title="Crear nuevo usuario">
    <img src="{{ asset('images/icons/add-user-32.png') }}" alt="">
  </a>
  <div class="table-responsive" >
    <table class="table" id="usuarios">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Correo</th>
          <th scope="col">Tipo</th>
          <th scope="col">Acción</th>
        </tr>
      </thead>
      <tbody>
        @php
          $index = 0;
        @endphp
        @foreach ($usuarios as $usuario)
          <tr>
            <th scope="row">{{ ++$index }}</th>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->tipo }}</td>
            <td>
              <a href="{{ route('admin.usuarios.editar',$usuario->id) }}" class="btn btn-warning" data-toggle="tooltip" data-replacement="top" title="Editar usuario">
                <img src="{{ asset('images/icons/edit-2-24.png') }}" alt="">
              </a>
              <a href="javascript:void(0);" class="btn btn-danger confirmModal" data-id="{{ $usuario->id }}" data-toggle="tooltip" title="Eliminar usuario">
                <img src="{{ asset('images/icons/x-mark-3-24.png') }}" alt="">
              </a>          
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- Modal de confirmación -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este usuario?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Eliminar</button>
            </div>
        </div>
    </div>
  </div>

  <!-- Fin Modal de confirmación -->
  <div style="padding: 100px;"></div>
  @section('js')
    <script src="{{ asset('modals/js/jquery.confirmModal.min.js') }}"></script>
    <script>
      document.getElementById('section-usuarios').className += " default-text-color";
      $('.confirmModal').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        $.confirmModal('¿Estas seguro de eliminar este usuario?', function() {
            window.location.href = "{{ route('admin.usuarios.eliminar') }}"+"?id="+id;
        });
      });

      //Codigo para adornar las tablas con datatables
	    $(document).ready(function() {
	        $('#usuarios').DataTable({

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
	            			'csvHtml5',
	            			'excelHtml5',
	            			'pdfHtml5',
	            			{ extend: 'print', text: 'Imprimir' },
	            		]},
	                { extend: 'colvis', text: 'Columnas visibles' },
	                { extend:'pageLength',text:'Ver registros'},
	            ],
	            "language": {
                   "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
               }
	        });
	    });

      // Código para mostrar el modal de confirmación
      $(document).ready(function() {
        // Mostrar el modal cuando se hace click en el enlace de eliminar
        $(".confirmModal").on("click", function() {
            var userId = $(this).data("id");  // Obtener el ID desde el atributo data-id
            // Establecer el ID de usuario en el botón de confirmación
            $("#confirmDeleteButton").data("userId", userId);
            // Mostrar el modal de confirmación
            $("#confirmDeleteModal").modal("show");
        });

        // Eliminar el usuario cuando se confirme
        $("#confirmDeleteButton").on("click", function() {
            var userId = $(this).data("userId");
            // Redirigir a la ruta de eliminación con el ID del usuario
            window.location.href = "{{ url('admin/usuarios/eliminar') }}/" + userId;
        });
     });


    </script>
  @endsection
@endsection
