@extends('layouts.app')

@section('titulo', 'Biblioteca')

@section('descripcion', 'Sistema de control de la biblioteca del ITSCH')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/content/instituto/biblioteca.png') }}" alt="Biblioteca" class="img-fluid" width="400px">
            </div>
            <div class="col-md-6" style="text-align: center">
                <h1>Biblioteca</h1>
                <p>En esta sección se encuentra el sistema de control de la biblioteca del ITSCH.</p>
                <p>Para acceder al sistema de control de la biblioteca del ITSCH, ingres tu número de control:</p>
                <div class="input-group mb-3 input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">N. control</span>
                    </div>
                    <input type="text" class="form-control" id="control" required name="control" placeholder="Numero de control">
                    <button class="btn btn-primary" onclick="findAlumno()"><i class="fas fa-search"></i></button>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12" id="datos" hidden>
                        <!-- Datos del alumno -->
                        <h3>Bienvenid@</h3>
                        <div class="row">
                            <div class="col-sm-3">Control: <h6 id="cont">x</h6></div>
                            <div class="col-sm-5">Nombre: <h6 id="nom">y</h6></div>
                            <div class="col-sm-4">Carrera: <h6 id="carr">z</h6></div>
                        </div>
                        <hr>
                        <!-- Datos para elegir servicios de la biblioteca -->
                        <h5>Elige un servicio</h5>
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Servicio</span>
                            </div>
                            <select name="servicio" id="servicio" class="form-control" required>
                                <option value="">Selecciona un servicio</option>
                                <option value="1">Consulta en sala</option>
                                <option value="2">Prestamo de cúbiculo</option>
                                <option value="3">Hemeroteca</option>
                                <option value="4">Sala de computo</option>
                            </select>
                            <button class="btn btn-secondary">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection

@section('js')
    <script>
        function findAlumno(){
            var control = $('#control').val();
            if(control.length == 9){
                $.ajax({
                    url: "{{ route('biblioteca.findAlumno') }}",
                    method: "GET",
                    data: {control: control},
                    success: function(data){
                        console.log(data);
                        // Mostrar datos del alumno
                        $('#cont').text(data.alu_NumControl);
                        nombre = data.alu_Nombre + ' ' + data.alu_ApePaterno + ' ' + data.alu_ApeMaterno;
                        $('#nom').text(nombre);
                        $('#carr').text(data.car_Clave);
                        $('#datos').removeAttr('hidden');
                    },
                    error: function(xhr, status, error){
                        console.log(xhr);
                    }
                });
            }
        }
    </script>
@endsection
