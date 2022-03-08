@extends('layouts.plant_admin')

@section('titulo')
    Noticias | Inicio
@endsection

@section('contenido')

  <a href="{{ route('admin.noticias.crear')}}" class="btn btn-primary float-right mb-1" data-toggle="tooltip" data-replacement="top" title="Crear nueva noticia">
    <img src="{{ asset('images/icons/add-file-32.png') }}" alt="">
  </a>
  <div style="clear:both;"></div>

  <div class="table-responsive">
    <table class="table" id="noticias">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Título</th>
          <th scope="col">Author</th>
          <th scope="col">Tipo</th>
          <th scope="col">F. Publicación</th>
          <th scope="col">F. Termino</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @php
          $index = 0;
          $date = "";
        @endphp
        @foreach ($articles as $article)
          <tr>
            @php
                $date = strtok($article->created_at," ");
            @endphp
            <th scope="row">{{ ++$index }}</th>
            <td>{{ $article->titulo }}</td>
            <td>{{ $article->autor }}</td>
            @if($article->resaltar==0)
                <th>Sin carrusel</th>
            @else
                <th>En carrusel</th>
            @endif
            <td>{{ $article->fecha_pub }}</td>
            <td>{{ $article->fecha_fin }}</td>
            <td>
              <a href="{{ route('admin.noticias.ver',$article->id) }}" class="btn btn-mds-primary" data-toggle="tooltip" data-replacement="top" title="Vista previa">
                <img src="{{ asset('images/icons/eye-3-24.png') }}" alt="">
              </a>
              <a href="{{ route('admin.noticias.editar',$article->id) }}" class="btn btn-warning" data-toggle="tooltip" data-replacement="top" title="Editar noticia">
                <img src="{{ asset('images/icons/edit-2-24.png') }}" alt="">
              </a>
              <a href="#" id="{{ $article->id }}" class="btn btn-danger confirmModal" data-toggle="tooltip" data-replacement="top" title="Eliminar noticia">
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
      document.getElementById('section-articulos').className += " default-text-color";
      $('.confirmModal').click(function(e) {
          e.preventDefault();
          var id = $(this).attr('id');
          $.confirmModal('¿Estas seguro de eliminar este articulo?', function() {
              window.location.href = "{{ route('admin.noticias.eliminar') }}"+"?id="+id;
          });
      });

       //Codigo para adornar las tablas con datatables
	    $(document).ready(function() {
	        $('#noticias').DataTable({

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
