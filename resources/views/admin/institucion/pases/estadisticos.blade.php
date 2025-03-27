@extends('layouts.plant_admin')

@section('titulo')
    Institución | Pases | Estadisticos
@endsection

@section('contenido')
    @section('ruta', 'Institución | Pases | Estadisticos')    
    <div class="row">
        <div class="col-md-2">
            <label for="fecha_inicio">Fecha de inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ date('Y-m-d') }}">
        </div>
        <div class="col-md-2">
            <label for="fecha_fin">Fecha de fin</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ date('Y-m-d') }}">
        </div>
        <div class="col-md-2">
            <label for="area_id">Filtro por área</label>
            <select name="area_id" id="area_id" class="form-control">
                <option value="">Seleccione un área</option>
                <option value="0">Todas las áreas</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">            
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
    </div>  
    <br>
    <br>  
@endsection

@section('js')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#area_id, #fecha_inicio, #fecha_fin').change(function() {
                var area_id = $('#area_id').val();
                var fecha_inicio = $('#fecha_inicio').val();
                var fecha_fin = $('#fecha_fin').val();
        
                if(area_id && fecha_inicio && fecha_fin){
                    $.ajax({
                        url: "{{ route('pases.estadisticos.generar') }}",
                        type: "GET",
                        data: {
                            area_id: area_id,
                            fecha_inicio: fecha_inicio,
                            fecha_fin: fecha_fin
                        },
                        success: function(data) {
                            var dataPoints = [];
                            var max = 0;
                            var titulo = '';

                            // Detectamos si es "todas las áreas" o una área específica
                            if ($('#area_id').val() == 0) {
                                titulo = "Top 5 áreas con más pases";
                            } else {
                                titulo = "Top 5 trabajadores con más pases";
                            }

                            data.forEach(function(item) {
                                dataPoints.push({
                                    label: item.nombre,
                                    y: parseInt(item.cantidad_pases)
                                });
                                if(parseInt(item.cantidad_pases) > max){
                                    max = parseInt(item.cantidad_pases);
                                }
                            });

                            max = max + 2;

                            var chart = new CanvasJS.Chart("chartContainer", {
                                animationEnabled: true,
                                title: {
                                    text: titulo // aquí ya se adapta dinámico
                                },
                                axisY: {
                                    title: "Cantidad de Pases",
                                    minimum: 0,
                                    maximum: max,
                                    interval: 1
                                },
                                data: [{
                                    type: "column",
                                    dataPoints: dataPoints
                                }]
                            });
                            chart.render();
                        }

                    });
                }
            });
        });
    </script>
    
@endsection