@extends('layouts.plant_admin')
@section('titulo','Servicios')
@section('css')
    <style>
        #chartContainer {
            width: 80%;
            max-width: 800px;
            height: auto;
            margin: auto;
        }
        #myPieChart {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
@section('contenido')
    @section('ruta','Servicios')
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
    {{-- Mostramos una tabla con los servicios y el numero total de alumnos que solicitaron el servicio en un periodo --}}
    <table class="table" id="tabServicios">
        <thead>
            <tr>
                <th>Servicio</th>
                <th>Total de solicitudes en el periodo</th>
            </tr>
        </thead>
        <tbody>
            {{-- Aqui se llenan los datos con ajax --}}
        </tbody>
    </table>
    <hr>
    {{-- Generamos un grafico de pastel con ls resultados del ajax --}}
    <div id="chartContainer">
        <canvas id="myPieChart"></canvas>
    </div>
    <br>
    <br>

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
                url: "{{route('biblioteca.servicios.find')}}",
                type: 'GET',
                data: {
                    inicio: inicio,
                    fin: fin
                },
                success: function(data){
                    console.log(data);
                    //Mostrar los datos en la tabla tabServicios
                    var dataTable = $('#tabServicios').DataTable();
                    dataTable.clear().draw();
                    // Variables para el gráfico de pastel
                    var servicios = [];
                    var cantidades = [];
                    Object.values(data).forEach(element => {
                        dataTable.row.add([
                            element.servicio,
                            element.cantidad
                        ]).draw();
                        servicios.push(element.servicio);
                        cantidades.push(element.cantidad);
                    });
                    // Generar el gráfico de pastel
                    var ctx = document.getElementById('myPieChart').getContext('2d');
                    var myPieChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: servicios,
                            datasets: [{
                                data: cantidades,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: 'Servicios Biblioteca'
                                },
                                datalabels: {
                                    formatter: (value, context) => {
                                        let label = context.chart.data.labels[context.dataIndex];
                                        return `${label}: ${value}`;
                                    },
                                    color: '#000',
                                    font: {
                                        weight: 'bold'
                                    }
                                }
                            }
                        },
                        plugins: [ChartDataLabels]
                    });

                }
            });
        }
    </script>
@endsection

