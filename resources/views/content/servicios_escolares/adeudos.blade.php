@extends('layouts.app')

@section('content')    
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h1>Adeudos</h1>
            <p>En esta sección se mostrarán los adeudos que tiene el alumno.</p>
            <p>Se mostrará el adeudo total y el detalle de los adeudos.</p>
            <div class="card">
                <img src="{{ asset('images/adeudo.jpg') }}" class="card-img-top" alt="Fissure in Sandstone"/>
                <div class="card-body">
                    <h5 class="card-title">Consulta adeudos</h5>
                    <p class="card-text">Consulta aquí si tienes algun adeudo con la institución antes de realizar los tramites de (Egreso, Titulación, Baja definitiva), imprime tu constancia de no adeudos.</p>
                
                    <input type="text" class="form-control col-sm-6" placeholder="Numero de control" id="control" aria-label="Numero de control" aria-describedby="basic-addon1">
                    <br>
                    <a href="#!" id="btnBuscar" class="btn btn-primary" data-mdb-ripple-init>Buscar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div> 
    <div id="noAdeudos" style="display: none;">
        <h2>Constancia de no adeudos</h2>
        <h4 id="alumnoSA"></h4>
        <p>Imprime tu constancia de no adeudos para realizar los tramites de (Egreso, Titulación, Baja definitiva).</p>
        <form action="{{ route('alumnos.adeudos.imprimir') }}" method="GET" >           
            <input type="hidden" name="controlR" id="controlR">
            <button type="submit" class="btn btn-primary">Imprimir</button>
        </form>       
        <br><br>
    </div>    
    <div id="adeudos" style="display: none;">
        <h2>Adeudos</h2>
        <h4 id="alumno"></h4>
        <table class="table table-striped table-hover" id="tabAdeudos">
            <thead>
                <tr>
                    <th>Concepto</th>
                    <th>Area</th>
                    <th>Fecha de adeudo</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
        <p>Para poder imprimir tu constancia de no adeudos primero debes asistir al(los) departamento(s) donde tienes los adeudos antes mencionados y solicitar un acuerdo para la liberación del mismo</p>        
    </div> 
@endsection

@section('js')
    <script>
       $(document).ready(function() {
            $("#btnBuscar").on("click", function() {
                let control = $("#control").val().trim(); // Obtener el valor del input
                $("#controlR").prop("value", control);
                if (control === "") {
                    alert("Por favor ingresa un número de control.");
                    return;
                }

                $.ajax({
                    url: "{{ route('alumnos.adeudos.buscar') }}", 
                    type: "GET",
                    data: { control: control },
                    beforeSend: function() {
                        $("#btnBuscar").prop("disabled", true).text("Buscando...");
                    },
                    success: function(response) {
                        $("#btnBuscar").prop("disabled", false).text("Buscar");

                        // Si no hay adeudos, mostrar mensaje y ocultar la tabla
                        if (!response.adeudo || response.adeudo.length === 0) {                 
                            $('#noAdeudos').show();
                            $('#adeudos').hide();
                            $("#alumnoSA").text(`${response.alumno.alu_Nombre} ${response.alumno.alu_ApePaterno} ${response.alumno.alu_ApeMaterno}`);
                            return;
                        }

                        $('#noAdeudos').hide(); // Ocultar el mensaje de no adeudos
                        

                        // Mostrar el nombre del alumno
                        $("#alumno").text(`${response.alumno.alu_Nombre} ${response.alumno.alu_ApePaterno} ${response.alumno.alu_ApeMaterno}`);

                        // Limpiar la tabla antes de agregar datos nuevos
                        $("#tabAdeudos tbody").empty();
                        $('#adeudos').show(); // Mostrar la tabla
                        
                        // Agregar los adeudos a la tabla                         
                        let fila = `
                            <tr>
                                <td>${response.adeudo.concepto}</td>
                                <td>${response.area ? response.area.nombre : 'No especificado'}</td>
                                <td>${response.adeudo.fecha_adeudo}</td>
                            </tr>`;
                        $("#tabAdeudos tbody").append(fila);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error en la solicitud:", error);
                        $("#btnBuscar").prop("disabled", false).text("Buscar");
                    }
                });
            });
        });
    </script>
@endsection