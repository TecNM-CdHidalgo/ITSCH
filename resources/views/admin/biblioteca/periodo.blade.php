@extends('layouts.plant_admin')
@section('titulo','Periodos')
@section('contenido')
    @section('ruta','Periodo')
    {{-- Pedimos un periodo de tiempo para hacer la consulta --}}
    <div class="row">
        <div class="col">
            <label for="inicio">Inicio</label>
            <input name="inicio" type="date" class="form-control" id="inicio" aria-describedby="emailHelp" required>
        </div>
        <div class="col">
            <label for="fin">Fin</label>
            <input name="fin" type="date" class="form-control" id="fin" aria-describedby="emailHelp" required>
        </div>
        <div class="col">
            <br>
            {{-- Boton para llamar ajax que consulta los servicios del periodo --}}
            <button class="btn btn-primary" onclick="consultaPeriodo()">Consultar</button>
        </div>
    </div>

    <hr>
    {{-- Tabla para mostrar los datos del periodo --}}
    <table class="table" id="tabPeriodo">
        <thead>
            <tr>
                <th>Servicio</th>
                <th>Carrera</th>
                <th>Numero de Control</th>
                <th>Nombre</th>
                <th>Sexo</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            {{-- Aqui se llenan los datos con ajax --}}
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        //Codigo para adornar las tablas con datatables
        $(document).ready(function() {
            $('#tabPeriodo').DataTable({

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

        //Funcion para hacer la consulta de los servicios del periodo
        function consultaPeriodo(){
            var inicio = $('#inicio').val();
            var fin = $('#fin').val();
            $.ajax({
                url: "{{route('biblioteca.periodo.find')}}",
                type: 'GET',
                data: {
                    inicio: inicio,
                    fin: fin
                },
                success: function(data){
                    console.log(data);
                    //Mostrar los datos en la tabla tabPeriodo
                    $('#tabPeriodo').DataTable().clear().draw();
                    for (let i = 0; i < data.length; i++) {
                        $('#tabPeriodo').DataTable().row.add([
                            data[i].servicio,
                            data[i].carrera,
                            data[i].control,
                            data[i].nombre,
                            data[i].sexo,
                            data[i].created_at
                        ]).draw();
                    }
                }
            });
        }
    </script>
@endsection
