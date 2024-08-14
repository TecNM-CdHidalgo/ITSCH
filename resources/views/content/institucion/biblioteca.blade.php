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
                <hr>
                <p>Para acceder al sistema de control de la biblioteca del ITSCH, ingres tu número de control:</p>
                <div class="input-group mb-3 input-group-md">
                    <div class="input-group-prepend">
                        <span class="input-group-text">N. control</span>
                    </div>
                    <input type="text" class="form-control mayusculas" id="control" required name="control" placeholder="Numero de control">
                    <button class="btn btn-primary" onclick="findAlumno()"><i class="fas fa-search"></i></button>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12" id="datos" hidden>
                        {{-- Boton de salida --}}
                        <button class="btn btn-danger" onclick="exitAlumno()"><i class="fas fa-sign-out-alt"></i> Salida</button>
                        <!-- Datos del alumno -->
                        <h3>Bienvenid@</h3>
                        <div class="row">
                            <div class="col-sm-3">Control: <h6 id="cont">x</h6></div>
                            <div class="col-sm-5">Nombre: <h6 id="nom">y</h6></div>
                            <div class="col-sm-4">Carrera: <h6 id="carr">z</h6></div>
                        </div>
                        <input type="hidden" readonly name="sexo" id="sexo">
                        <input type="hidden" readonly name="carrera" id="carrera">
                        <input type="hidden" readonly name="extras" id="extras">
                        <hr>
                        <!-- Datos para elegir servicios de la biblioteca -->
                        <h5>Elige un servicio</h5>
                        <div class="input-group mb-3 input-group-md">
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
                            <button class="btn btn-secondary" onclick="guardar()">Registrar</button>
                        </div>
                        <h5 id="txtAcom" hidden></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <!-- Modal para agregar los acompañantes para usar un cubiculo minimo 3 maximo 10 -->
    <div class="modal" id="modalAcompañantes">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Acompañantes para uso de cubiculo</h4>
                <button type="button" class="close cerrar" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p>Recuerda que para usar un cubiculo minimo tendran que ser 3 alumnos y maximo 10</p>
                    <!-- Selección del numero de acompañantes -->
                    <div class="input-group mb-3 input-group-md">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Acompañantes</span>
                            </div>
                            <input type="number" name="n_acom" id="n_acom" min="3" max="10">
                            <hr>
                            <div id="acompañantes">
                                <!-- Aqui se agregaran los inputs para los acompañantes -->
                            </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger cerrar" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="saveAcompañantes" onclick="saveAcompañantes()">Pre registro</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        //Llamamos la funcion findAlumno cuando se presione enter en el input de control
        $('#control').keypress(function(e){
            if(e.which == 13){
                findAlumno();
            }
        });

        //llamamos a la funcion mayusculas cuando se presione una tecla en el input de control
        $('#control').keyup(function(){
            mayusculas(this);
        });

        // Funcion para registrar la salida del alumno
        function exitAlumno(){
            var no_control = $('#cont').text();
            $.ajax({
                url: "{{ route('biblioteca.salida') }}",
                method: "GET",
                data: {no_control: no_control},
                success: function(data){
                    console.log(data);
                    if(data){
                        Swal.fire('Exito', 'Se registro la salida del alumno', 'success');
                        $('#control').val('');
                        $('#datos').attr('hidden', true);
                        $('#servicio').val('');
                        $('#txtAcom').text('');
                    }else{
                        Swal.fire('Error', 'No se pudo registrar la salida', 'error');
                    }
                },
                error: function(xhr, status, error){
                    //Imprimimos la respuesta del servidor en caso de error que viene en formato json
                    console.log(xhr);
                    Swal.fire('Error', xhr.responseJSON.error, 'error');
                }
            });
        }

        // Funcion para buscar al alumno por su numero de control
        function findAlumno(){
            var control = $('#control').val();
            if(control.length == 9){
                $.ajax({
                    url: "{{ route('biblioteca.findAlumno') }}",
                    method: "GET",
                    data: {control: control},
                    success: function(data){
                        //Limpiamos los datos del alumno anterior
                        $('#cont').text('');
                        $('#nom').text('');
                        $('#carr').text('');
                        $('#datos').attr('hidden', true);
                        $('#sexo').val('');
                        $('#carrera').val('');
                        console.log(data);
                        // Mostrar datos del alumno
                        $('#cont').text(data.alu_NumControl);
                        nombre = data.alu_Nombre + ' ' + data.alu_ApePaterno + ' ' + data.alu_ApeMaterno;
                        $('#nom').text(nombre);
                        $('#carr').text(data.carrera);
                        $('#datos').removeAttr('hidden');
                        $('#sexo').val(data.alu_Sexo);
                        $('#carrera').val(data.car_Clave);
                        //Agregamos la ruta al boton de salida, para que se registre la salida del alumno
                        $('#salida').attr('href', $('#salida').attr('href').replace(':numControl', data.alu_NumControl));
                    },
                    error: function(xhr, status, error){
                        //Limpiamos los datos del alumno anterior
                        $('#cont').text('');
                        $('#nom').text('');
                        $('#carr').text('');
                        $('#datos').attr('hidden', true);
                        $('#sexo').val('');
                        $('#carrera').val('');
                        console.log(error);
                    }
                });
            }
        }

        function guardar(){
            var control = $('#cont').text();
            var servicio = $('#servicio').val();
            if(servicio != ''){
                $.ajax({
                    url: "{{ route('biblioteca.store') }}",
                    method: "GET",
                    data: {control: control, servicio: servicio, car_Clave: $('#carrera').val(), sexo: $('#sexo').val(), extras: $('#extras').val()},
                    success: function(data){
                        console.log(data);
                        if(data){
                            Swal.fire('Exito', 'Se registro el servicio', 'success');
                            $('#control').val('');
                            $('#datos').attr('hidden', true);
                            $('#servicio').val('');
                            $('#txtAcom').text('');
                        }else{
                            Swal.fire('Error', 'No se pudo registrar el servicio', 'error');
                        }
                    },
                    error: function(xhr, status, error){
                        console.log(xhr);
                    }
                });
            }else{
                Swal.fire('Error', 'Selecciona un servicio', 'error');
            }
        }

        // Funcion para agregar los acompañantes para usar un cubiculo cuando cambie el valor del select de servicios
        $('#servicio').change(function(){
            var servicio = $('#servicio').val();
            if(servicio == 2){
                $('#modalAcompañantes').modal('show');
                $('#n_acom').val(3);
                $('#extras').val("");
                $('#txtAcom').text("");
                //llamamos la función para agregar los inputs de los acompañantes
                addInputs();
            }
            else if(servicio == 4){
                //Si el servicio es la sala de computo abrimos un modal donde elijan a que sala van a entrar
                Swal.fire({
                    title: 'Sala de computo',
                    text: '¿A que sala quieres entrar?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Sala 1',
                    cancelButtonText: 'Sala 2'
                }).then((result) => {
                    if(result.value){
                        $('#extras').val("Sala 1");
                        $('#txtAcom').text("Sala 1");
                    }else{
                        $('#extras').val("Sala 2");
                        $('#txtAcom').text("Sala 2");
                    }
                });
                //Hacemos visible la etiqueta txtAcom para mostrar la sala a la que entrara
                $('#txtAcom').removeAttr('hidden');
            }
            else{
                $('#txtAcom').attr('hidden', true);
                $('#extras').val("N/A");
            }
        });

        // Funcion para agregar los inputs de cada acompañante
        $('#n_acom').change(function(){
            addInputs();
        });

        //Funcion que agrega inputs para los acompañantes cuando se abra el modal
        function addInputs()
        {
            var acompanantes = $('#n_acom').val();
            if(acompanantes < 3){
                acompanantes=3;
                $('#n_acom').val(3);
            }else if(acompanantes > 10){
                acompanantes=10;
                $('#n_acom').val(10);
            }
            //Creamos un input para cada acompañante
            var html = '';
            html += '<hr>';
            for(var i = 0; i < acompanantes; i++){
                html += '<div class="input-group mb-3 input-group-md">';
                html += '<div class="input-group-prepend">';
                html += '<span class="input-group-text">Acompañante ' + (i + 1) + '</span>';
                html += '</div>';
                html += '<input type="text" name="acompañante' + (i + 1) + '" id="acompañante' + (i + 1) + '" class="form-control mayusculas" placeholder="Numero de control del acompañante">';
                html += '</div>';
            }
            $('#acompañantes').html(html);
        }

        // Funcion para guardar los acompañantes para usar un cubiculo
        function saveAcompañantes(){
            var acompañantes="";
            var error=false;
            $('#extras').val("");
            for(var i = 0; i < $('#n_acom').val(); i++){
                if($('#acompañante' + (i + 1)).val() != ''){
                    //Verificamos que los numeros de control no se repitan
                    for(var j = 0; j < $('#n_acom').val(); j++){
                        if($('#acompañante' + (i + 1)).val() == $('#acompañante' + (j + 1)).val() && i != j){
                            Swal.fire('Error', 'No puedes repetir numeros de control', 'error');
                            return;
                        }
                    }
                    acompañantes += $('#acompañante' + (i + 1)).val() + ',';
                    error=false;
                }
                else{
                   error=true;
                }
            }
            if(error){
                Swal.fire('Error', 'Ingresa el numero de control de todos los acompañantes', 'error');
                return;
            }
            else{
                $('#extras').val(acompañantes);
                $('#txtAcom').text('Acompañantes: ' + acompañantes);
                $('#txtAcom').removeAttr('hidden');
                $('#modalAcompañantes').modal('hide');
            }
        }

        // Funcion para cerrar el modal de los acompañantes usando la clase cerrar
        $('.cerrar').click(function(){
            $('#modalAcompañantes').modal('hide');
        });

        //Llamamos a la función mayusculas cuando se presione una tecla en los inputs con la clase mayusculas
        $(document).on('keyup', '.mayusculas', function () {
            mayusculas();
        });

        //Función para cambiar a mayusculas el numero de control
        function mayusculas(x){
            $('.mayusculas').each(function() {
                this.value = this.value.toUpperCase();
            });
        }




    </script>
@endsection
