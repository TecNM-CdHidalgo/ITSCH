@extends('layouts.plant_admin')

@section('titulo')
    Institución | Adeudos | Eliminar todos los adeudos
@endsection

@section('contenido')
    @section('ruta', 'Institución | Adeudos | Eliminar todos los adeudos')
    <div class="container">
        <div class="row">
            <div class="col-md-12">  
                {{-- Preguntamos si esta seguro de eliminar y ejecutamos la acción --}}
                <form action="{{ route('adeudos.destroyAll') }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar todos los adeudos pagados?');">
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar adeudos pagados</button>
                </form>
                <br><br>
                {{-- Mostramos todos los registros de adeudos --}}
                <table class="table table-sm" id="T-adeudos" >
                    <thead>
                        <tr>
                            <th>Control</th>                           
                            <th>Alumno</th>
                            <th>Carrera</th>                            
                            <th>Concepto</th>
                            <th>Fecha de adeudo</th>  
                            <th>Status</th>                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adeudos as $adeudo)
                            <tr>
                                <td>{{ $adeudo->control }}</td>                                
                                <td>
                                    {{ $adeudo->alumno?->alu_Nombre ?? 'No encontrado' }}
                                    {{ $adeudo->alumno?->alu_ApePaterno ?? '' }}
                                    {{ $adeudo->alumno?->alu_ApeMaterno ?? '' }}
                                </td>
                                <td>{{ $adeudo->carrera }}</td>                                
                                <td>{{ $adeudo->concepto }}</td>
                                <td>{{ $adeudo->fecha_adeudo }}</td> 
                                <td>{{ $adeudo->status }}</td>                               
                            </tr>
                        @endforeach                     
                    </tbody>
                </table>
            </div>    
            <div style="padding: 100px;"></div>        
@endsection

@section('js')
    <script>
        //Codigo para adornar las tablas con datatables
        $(document).ready(function() {
            $('#T-adeudos').DataTable({

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