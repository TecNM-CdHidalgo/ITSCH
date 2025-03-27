@extends('layouts.plant_admin')

@section('titulo')
    Institución | Pases
@endsection

@section('contenido')
    @section('ruta', 'Institución | Pases')
    <a href="{{ route('pases.create') }}" class="btn btn-success" title="Agregar pase"><i class="fas fa-id-badge"></i></a>  
    {{--Verificamos que el usuario tenga el permiso verificar_pases o el permiso VIP para mostrar el botón de estadísticas--}}    
    @if(auth()->user()->hasAnyPermission(['verificar_pases', 'VIP']))
        <a href="{{ route('pases.estadisticos') }}" class="btn btn-primary" title="Agregar pase"><i class="fas fa-chart-pie"></i></a>
    @endif 
    <br>
    <br>
    <table class="table" id="table_pases">
        <thead>
            <tr>
                <th>No.</th>
                <th>Área</th>
                <th>Trabajador</th>
                <th>Motivo</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pases as $pase)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pase->area }}</td>
                    <td>{{ $pase->usuario }}</td>
                    <td>{{ $pase->motivo }}</td>
                    <td>{{ $pase->fecha_solicitud }}</td>
                    <td>{{ $pase->estado }}</td>
                    <td>                        
                        <a href="{{ route('pases.edit', $pase->id) }}" class="btn btn-warning" title="Editar pase"><i class="fas fa-edit"></i></a>                      
                        {{--Este link colo lo mostramos al jefe del área para que pueda verificar el pase de su trabajador--}}
                        @if (auth()->user()->hasAnyPermission(['verificar_pases', 'VIP']) || auth()->user()->id == $pase->jefe_id)
                            <form action="{{ route('pases.destroy', $pase->id) }}" method="GET" id="formEliminar" style="display: inline-block;">                                                                       
                                <button type="button" class="btn btn-danger" title="Eliminar pase"  onclick="confirmarEliminar()"><i class="fas fa-trash-alt"></i></button>
                            </form> 
                            <a href="{{route('pases.verificar',$pase->id)}}" class="btn btn-primary" title="Verificar pase"><i class="fab fa-algolia"></i></a>
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
        function confirmarEliminar() { 
            event.preventDefault(); // Evita que el formulario se envíe inmediatamente
            Swal.fire({
                title: "¿Estás seguro de eliminar?",
                text: "Esta acción no se puede deshacer",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("formEliminar").submit();
                }
            });
        }
    </script>
    <script>
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