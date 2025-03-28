@extends('layouts.plant_admin')

@section('titulo')
    Institución | Pases
@endsection

@section('contenido')
    @section('ruta', 'Institución | Pases | Agregar pase')
   
    <div class="row">
        <div class="col-md-3 ">
            <div class="input-group mb-3">                    
                <div class="input-group-prepend">
                    <span class="input-group-text">Fecha inicio</span>    
                </div>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ date('Y-m-d') }}" > 
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="input-group mb-3">                    
                <div class="input-group-prepend">
                    <span class="input-group-text">Fecha fin</span>    
                </div>
                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ date('Y-m-d') }}" > 
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="input-group mb-3">                    
                <div class="input-group-prepend">
                    <span class="input-group-text">Trabajador</span>    
                </div>
                <select name="trabajador_id" id="trabajador" class="form-control">
                    <option value="">Seleccione un trabajador</option>
                    @foreach ($trabajadores as $trabajador)
                        <option value="{{ $trabajador->id }}">{{ $trabajador->name }}</option>
                    @endforeach
                </select>
            </div>                                       
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">                    
                <div class="input-group-prepend">
                    <span class="input-group-text">Área</span>    
                </div>
                <select name="area_id" id="area" class="form-control">
                    <option value="">Seleccione un área</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>                   
    </div>
    <h6 id="Tipo_consulta">Sin filtro</h6>
    <table class="table" id="table_pases">
        <thead>
            <tr>
                <th>No.</th>
                <th>Área</th>
                <th>Trabajador</th>
                <th>Motivo</th>
                <th>Fecha</th>
                <th>Estado</th>                   
            </tr>
        </thead>
        <tbody id="pasesTableBody">
            @foreach ($pases as $pase)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pase->area }}</td>
                    <td>{{ $pase->usuario }}</td>
                    <td>{{ $pase->motivo }}</td>
                    <td>{{ $pase->fecha_solicitud }}</td>
                    <td>
                        @if ($pase->estado == 'pendiente')
                            <span class="badge badge-warning">Pendiente</span>
                        @elseif ($pase->estado == 'aprobado')
                            <span class="badge badge-success">Aprobado</span>
                        @elseif ($pase->estado == 'denegado')
                            <span class="badge badge-danger">Rechazado</span>
                        @endif
                    </td>                        
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <br>
    <br>
@endsection 
@section('js')
    <script>
        $(document).ready(function() {
            var trabajadorSeleccionado = null;
            var areaSeleccionada = null;

            $('#trabajador').change(function() {
                trabajadorSeleccionado = $('#trabajador').val();                
                consultarPases(trabajadorSeleccionado, areaSeleccionada);
            });

            $('#area').change(function() {
                areaSeleccionada = $('#area').val();                
                consultarPases(trabajadorSeleccionado, areaSeleccionada);
            });           

            function consultarPases(trabajador_id, area_id) {
                var fecha_inicio = $('#fecha_inicio').val();
                var fecha_fin = $('#fecha_fin').val();

                $.ajax({
                    url: "{{ route('pases.consultar') }}",
                    type: "GET",
                    data: {
                        trabajador_id: trabajador_id,
                        area_id: area_id,
                        fecha_inicio: fecha_inicio,
                        fecha_fin: fecha_fin
                    },
                    success: function(data) {
                        console.log(data);
                        // Limpiar la tabla antes de agregar los nuevos datos
                        $('#pasesTableBody').empty();
                        // Agregar los nuevos datos a la tabla
                        $.each(data, function(index, pase) {
                            var estadoBadge = '';
                            if (pase.estado == 'pendiente') {
                                estadoBadge = '<span class="badge badge-warning">Pendiente</span>';
                            } else if (pase.estado == 'aprobado') {
                                estadoBadge = '<span class="badge badge-success">Aprobado</span>';
                            } else if (pase.estado == 'denegado') {
                                estadoBadge = '<span class="badge badge-danger">Rechazado</span>';
                            }
                            $('#pasesTableBody').append(
                                '<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + pase.area + '</td>' +
                                    '<td>' + pase.usuario + '</td>' +
                                    '<td>' + pase.motivo + '</td>' +
                                    '<td>' + pase.fecha_solicitud + '</td>' +
                                    '<td>' + estadoBadge + '</td>' +
                                '</tr>'
                            );
                        });
                        // Actualizar el texto de consulta
                        var consultaTexto = "Consulta por ";
                        if (trabajadorSeleccionado) {
                            consultaTexto += "trabajador: " + $('#trabajador option:selected').text();
                        } else if (areaSeleccionada) {
                            consultaTexto += "área: " +  $('#area option:selected').text();
                        }
                        if (fecha_inicio && fecha_fin) {
                            consultaTexto += " entre las fechas " + fecha_inicio + " y " + fecha_fin;
                        }
                        $('#Tipo_consulta').text(consultaTexto);
                    }
                });
            }
        });


        //Codigo para adornar las tablas con datatables
        $(document).ready(function() {
            $('#table_pases').DataTable({

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