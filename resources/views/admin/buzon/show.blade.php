@extends('layouts.plant_admin')

@section('contenido')
    <h3>Buzón</h3>
    <p>Panel de administracion del buzón de felicitaciones, quejas y sugerencias</p>
    <a href="{{ route('buzon.leidos') }}">Leidos</a>|<a href="{{ route('buzon.show') }}">No leidos</a>
    <hr>
    <table class="table" id="mensajes">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tipo</th>
                <TH>Nombre</TH>
                <th>Correo</th>
                <th>Fecha</th>
                <th>Mensaje</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($msj as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m->tipo }}</td>
                    <td>{{ $m->nombre }}</td>
                    <td>{{ $m->correo }}</td>
                    <td>{{ $m->created_at }}</td>
                    <td>{{ $m->mensaje }}</td>
                    <td>
                        <a href="{{ route('buzon.edit',$m->id) }}" class="btn btn-info btn-sm" title="Ver"><i class='fas fa-eye' style='font-size:14px'></i></a>
                        <button type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#myModalMsj" title="Eliminar" onclick="borrar({{ $m }})">
                            <i class='fas fa-trash-alt' style='font-size:14px'></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- The Modal -->
<div class="modal" id="myModalMsj">
    <div class="modal-dialog">
        <form action="{{ route('buzon.destroy') }}" method="get">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Eliminar mensaje</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Estas seguro de eliminar el mensaje
                    <input type="hidden" name="id" id="idT" readonly>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Borrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </form>
    </div>
  </div>

@endsection

@section('js')
    <script>
       //Codigo para adornar las tablas con datatables
	    $(document).ready(function() {
	        $('#mensajes').DataTable({

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

        function borrar(m)
        {
            $('#idT').val(m['id']);
        }
    </script>
@endsection
