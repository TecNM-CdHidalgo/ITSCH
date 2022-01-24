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
              <a href="#" class="btn btn-danger confirmModal" id="{{ $usuario->id }}" data-toggle="tooltip" data-replacement="top" title="Eliminar usuario">
                <img src="{{ asset('images/icons/x-mark-3-24.png') }}" alt="">
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
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
    </script>
  @endsection
@endsection
