@extends('layouts.plant_admin')

@section('contenido')
    @section('ruta','Proyectos')
    <div class="row">
        <div class="col-sm-3">
            <h6>Banco de proyectos ITSCH</h6>
        </div>
        <div class="col-sm-7"></div>
        <div class="col-sm-2" style="text-align: right">
            <a href="{{ route('admin.contenido.banco.crear') }}" type="button" class="btn btn-sm btn-success"><i class='fas fa-network-wired'></i> Agregar</a>
            <a href="{{ route('admin.contenido.banco.reportesIndex') }}" class="btn btn-primary btn-sm"><i class='fas fa-chart-bar'></i> Reportes</a>
        </div>
    </div>

    <br>
    <div class="table-responsive-sm">
        <table class="table table-hover" id="proyectos">
            <thead class="table-sm">
                <tr>
                    <th>Carrera</th>
                    <th>Proyecto</th>
                    <th>Empresa/Institución</th>
                    <th>Email</th>
                    <th>Responsable</th>
                    <th>Status</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banco as $ba)
                    <tr>
                        <td>{{ $ba->carrera }}</td>
                        <td>{{ $ba->proyecto }}</td>
                        <td>{{ $ba->empresa }}</td>
                        <td>{{ $ba->correo }}</td>
                        <td>{{ $ba->docente }}</td>
                        <td>
                            @if ($ba->status==1)
                                <p class="bg-success text-white">Inicio</p>
                            @elseif ($ba->status==2)
                                <p class="bg-warning text-white">En proceso</p>
                            @elseif ($ba->status==3)
                                <p class="bg-danger text-white">Terminado</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.contenido.banco.ver',$ba->id) }}" class="btn btn-success btn-sm" title="Ver más"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
       //Codigo para adornar las tablas con datatables
	    $(document).ready(function() {
	        $('#proyectos').DataTable({

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
