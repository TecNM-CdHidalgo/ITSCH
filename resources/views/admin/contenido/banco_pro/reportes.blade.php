@extends('layouts.plant_admin')

@section('contenido')
    @section('ruta','Proyectos | Reportes')
    <div class="row">
        <div class="col-sm-4">
            <h5>Convenios con proyectos registrados</h5>
            <button class="btn btn-primary btn-sm" onclick="repConvenios()">Consultar</button>
        </div>
        <div class="col-sm-4">
            <h5>Filtrar por convenio</h5>
            <div class="input-group mb-3 input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">Convenio </span>
                </div>
                <select name="convenio" id="convenio" required class="form-control">
                    <option value="">Selecciona un convenio</option>
                    @foreach ($convenios as $convenio)
                        <option value="{{$convenio->id}}">{{$convenio->institucion}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <h5>Filtrar por area de registro</h5>
            <div class="input-group mb-3 input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">Area </span>
                </div>
                <select name="area" id="area" required class="form-control">
                    <option value="">Selecciona un area</option>
                    <option value="Vinculación">Vinculación</option>
                    <option value="Investigación">Investigación</option>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div id="tabReporte">

    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#convenio').change(function(){
                var id = $(this).val();
                $.ajax({
                    url: "{{route('admin.contenido.banco.reportesConvenios')}}",
                    method: 'GET',
                    data: {id:id},
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        // Verificamos que al menos exista un proyecto en caso negativo solo mostramos un mensaje
                        if(data[0].proyectos.length == 0){
                           var tabla = '<h3>El convenio: '+data[0].institucion+', no tiene proyectos registrados<h3>';
                        }
                        else
                        {
                            // Creamos una tabla con los datos del convenio
                            var tabla = '<table class="table table-sm">';
                            tabla += '<thead><tr><th>Convenio</th><th>Proyectos</th><th>Carreras</th><th>Responsable</th><th>Profesores colaboradores</th><th>Alumnos colaboradores</th><th>Hombres</th><th>Mujeres</th></tr></thead>';
                            tabla += '<tbody><tr><td>'+data[0].institucion+'</td>';
                            tabla += '<td>'; // Iniciamos la celda de proyectos

                            var proyectos = '';
                            data[0].proyectos.forEach(function(pro) {
                                proyectos += pro.proyecto + '<br>'; // Concatenar los nombres de los proyectos con saltos de línea
                            });
                            tabla += proyectos; // Agregamos los proyectos a la celda
                            tabla += '</td>'; // Cerramos la celda de proyectos

                            //Agregamos las carreras que estan desarrollando los proyectos
                            tabla += '<td>';
                            var carreras = '';
                            data[0].proyectos.forEach(function(pro) {
                                carreras += pro.carrera + '<br>';
                            });
                            tabla += carreras;
                            tabla += '</td>';

                            // Agregamos los responsables de cada proyecto
                            tabla += '<td>';
                            var responsables = '';
                            data[0].proyectos.forEach(function(pro) {
                                responsables += pro.docente + '<br>';
                            });
                            tabla += responsables;
                            tabla += '</td>';

                            // Agregamos los profesores colaboradores de cada proyecto
                            tabla += '<td>';
                            var colaboradores = '';
                            data[0].proyectos[0].colaboradoresProfes.forEach(function(pro) {
                                colaboradores += pro.nombre + '<br>';
                            });
                            tabla += colaboradores;
                            tabla += '</td>';

                            // Agregamos los alumnos colaboradores de cada proyecto
                            tabla += '<td>';
                            var colaboradores = '';
                            data[0].proyectos[0].colaboradoresAlumnos.forEach(function(pro) {
                                colaboradores += pro.nombre + '<br>';
                            });
                            tabla += colaboradores;
                            tabla += '</td>';

                            // Agregamos los hombres de cada proyecto
                            tabla += '<td>';
                            var hombres = '';
                            data[0].proyectos.forEach(function(pro) {
                                hombres += pro.TotColAluHom + '<br>';
                            });
                            tabla += hombres;
                            tabla += '</td>';

                            // Agregamos las mujeres de cada proyecto
                            tabla += '<td>';
                            var mujeres = '';
                            data[0].proyectos.forEach(function(pro) {
                                mujeres += pro.TotColAluMuj + '<br>';
                            });
                            tabla += mujeres;
                            tabla += '</td>';

                            // Cerramos la tabla
                            tabla += '</tbody></table>';

                        }
                        $('#tabReporte').html(tabla);
                    }
                });
            });
        });

         // Funcion ajax para mostrar los convenios por area de registro
         $(document).ready(function(){
            $('#area').change(function(){
                var area = $(this).val();
                $.ajax({
                    url: "{{route('admin.contenido.repConvArea')}}",
                    method: 'GET',
                    data: {area:area},
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        // Verificamos si el area tiene proyectos resistrados y en caso negativo escribimos que no hay proyectos registrados
                        if(data.length == 0){
                            var tabla = '<h3>No hay proyectos registrados en el area de: '+area+'<h3>';
                        }
                        else
                        {
                            // Creamos una tabla con los datos del convenio
                            var tabla = '<table class="table table-sm">';
                            tabla += '<thead><tr><th>Proyecto</th><th>Área</th><th>Carrera</th><th>Responsable</th><th>Empresa</th><th>Fecha de inicio</th></tr></thead>';
                            tabla += '<tbody>';
                            data.forEach(function(proyecto) {
                                tabla += '<tr><td>'+proyecto.proyecto+'</td>';
                                tabla += '<td>'+proyecto.area+'</td>';
                                tabla += '<td>'+proyecto.carrera+'</td>';
                                tabla += '<td>'+proyecto.docente+'</td>';
                                tabla += '<td>'+proyecto.empresa+'</td>';
                                tabla += '<td>'+proyecto.inicio+'</td>';
                            });
                            tabla += '</tbody></table>';
                        }
                        $('#tabReporte').html(tabla);
                    }
                });
            });
        });

        // Función con ajax para mostrar los convenios con proyectos registrados
        function repConvenios()
        {
            //ajax para consultar los convenios con proyectos registrados
            $.ajax({
                url: "{{route('admin.contenido.banco.repConvProy')}}",
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    //Creamos una tabla con los datos de cada convenio y sus proyectos
                    var tabla = '<table class="table table-sm">';
                    tabla += '<thead><tr><th>Convenio</th><th>Tipo</th><th>Numero de proyectos registrados</th><th>Proyectos</th></thead>';
                    tabla += '<tbody>';
                    data.forEach(function(convenio) {
                        tabla += '<tr><td>'+convenio.institucion+'</td>';
                        tabla += '<td>'+convenio.tipo+'</td>';
                        tabla += '<td>'+convenio.proyectos+'</td>';
                        tabla += '<td>'; // Iniciamos la celda de proyectos

                        //Si no hay proyectos escribimos que no hay proyectos registrados en la tabla
                        if(convenio.proyectos == 0)
                        {
                            tabla += 'Sin proyectos registrados';
                            tabla += '</td>';
                        }
                        else
                        {
                            var proyectos = '';
                            convenio.nombreProyectos.forEach(function(pro) {
                                proyectos += pro.proyecto + '<br>'; // Concatenar los nombres de los proyectos con saltos de línea
                            });
                            tabla += proyectos; // Agregamos los proyectos a la celda
                            tabla += '</td>';
                        }
                    });
                    tabla += '</tbody></table>';
                    $('#tabReporte').html(tabla);
                }

            });
        }
    </script>
@endsection
