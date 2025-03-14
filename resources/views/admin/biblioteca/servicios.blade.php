@extends('layouts.plant_admin')
@section('titulo','Servicios')
@section('css')
    <style>
        #chartContainer {
            width: 40%;
            max-width: 400px;
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
    <div class="row">
        <div class="col-sm-4">
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
        </div>
        <div class="col-sm-8">
            {{-- Generamos un grafico de pastel con ls resultados del ajax --}}
            <div id="chartContainer">
                <canvas id="myPieChart"></canvas>
            </div>
        </div>
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
        function consultaPeriodo() {
            var inicio = $('#inicio').val();
            var fin = $('#fin').val();
            $.ajax({
                url: "{{route('biblioteca.servicios.find')}}",
                type: 'GET',
                data: {
                    inicio: inicio,
                    fin: fin
                },
                success: function(data) {
                    console.log(data);
                    var dataTable = $('#tabServicios').DataTable();
                    dataTable.clear().draw();

                    var servicios = [];
                    var cantidades = [];
                    Object.values(data).forEach(element => {
                        dataTable.row.add([element.servicio, element.cantidad]).draw();
                        servicios.push(element.servicio);
                        cantidades.push(element.cantidad);
                    });

                    // Destruir el gráfico anterior si existe
                    if (window.myPieChart instanceof Chart) {
                        window.myPieChart.destroy();
                    }

                    var ctx = document.getElementById('myPieChart').getContext('2d');

                    // Crear el gráfico con efecto 3D
                    window.myPieChart = new Chart(ctx, {
                        type: 'doughnut', // 'doughnut' en vez de 'pie' para simular 3D
                        data: {
                            labels: servicios,
                            datasets: [{
                                data: cantidades,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.9)',
                                    'rgba(54, 162, 235, 0.9)',
                                    'rgba(255, 206, 86, 0.9)',
                                    'rgba(75, 192, 192, 0.9)',
                                    'rgba(153, 102, 255, 0.9)',
                                    'rgba(255, 159, 64, 0.9)'
                                ],
                                hoverOffset: 6, // Hace que los segmentos "salten" al pasar el mouse
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            cutout: '30%', // Más delgado = más 3D
                            animation: {
                                animateRotate: true,
                                animateScale: true
                            },
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: 'Servicios Biblioteca'
                                }
                            }
                        },
                        plugins: [{
                            id: 'shadowEffect',
                            beforeDraw: (chart) => {
                                const ctx = chart.ctx;
                                ctx.save();
                                ctx.shadowColor = 'rgba(0, 0, 0, 0.5)';
                                ctx.shadowBlur = 10;
                                ctx.shadowOffsetX = 4;
                                ctx.shadowOffsetY = 6;
                                ctx.restore();
                            }
                        }]
                    });
                }
            });
        }
    </script>
@endsection

