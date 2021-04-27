@extends('layouts.plant_admin')

@section('contenido')

    <h4><a href="{{ route('carreras.index') }}"> Carreras/</a>Editar estructura academica/ {{ $programa->nombre }}</h4>
    <hr>
    <div style="text-align: right">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalAltasAtr">
            Agregar personal
        </button>       
    </div>
    <table class="table">
        <thead> 
            <th style="width: 5%">Numero</th>           
            <th style="width: 30%">Nombre</th>
            <th style="width: 40%">Area</th>
            <th style="width: 25%">Acciones</th>
                    
        </thead>
        <tbody>  
            @foreach ($personal as $per)                                        
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $per->nombre }} {{ $per->ap_paterno }} {{ $per->ap_materno }}</td>
                    <td>{{ $per->puesto }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalEditarEst" onclick="obtDatEditarEst({{ $per }})">
                            <i class='fas fa-edit' style='font-size:14px'></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalBajasEst" onclick="obtDatEliminarEst({{ $per }})">
                            <i class='fas fa-trash-alt' style='font-size:14px'></i>
                        </button>
                        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#myModalDetalleEst" onclick="obtDetalleEst({{ $per }},{{ $formacion }},{{ $productos }})">
                            <i class='far fa-eye' style='font-size:14px'></i>
                        </button>
                    </td>                    
                </tr>   
            @endforeach   
        </tbody>
    </table>
    <br>

    {{-- Sección de Modals --}}

    <!-- Modal Altas de Profesores -->
    <div class="modal fade" id="myModalAltasAtr">
        <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('carreras.storeEstructura') }}">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Alta de Personal</h4>                
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nombre</span>
                        </div>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Apellido Paterno</span>
                        </div>
                        <input type="text" class="form-control" name="ap_paterno" placeholder="Apellido paterno">
                    </div>  
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Apellido Materno</span>
                        </div>
                        <input type="text" class="form-control" name="ap_materno" placeholder="Apellido materno">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">email</span>
                        </div>
                        <input type="text" class="form-control" name="email" placeholder="Correo electrónico">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Puesto</span>
                        </div>
                        <input type="text" class="form-control" name="puesto" placeholder="Puesto">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Teléfono</span>
                        </div>
                        <input type="text" class="form-control" name="telefono" placeholder="Teléfono">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Extensión</span>
                        </div>
                        <input type="text" class="form-control" name="extension" placeholder="Extensión">
                    </div>                                       
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Programa</span>
                        </div>
                        <input type="text" class="form-control" readonly value="{{ $programa->nombre }}">
                    </div>                      
                    <input type="hidden" id="id_programa" name="id_programa" value="{{ $programa->id }}">
                    <br>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
        </div>
    </div>


    <!-- Modal Editar Profesores -->
    <div class="modal fade" id="myModalEditarEst">
    <div class="modal-dialog">
    <div class="modal-content">
        <form id="formEditarEst">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar de Personal</h4>                
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nombre</span>
                        </div>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Apellido Paterno</span>
                        </div>
                        <input type="text" class="form-control" name="ap_paterno" id="ap_paterno">
                    </div>  
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Apellido Materno</span>
                        </div>
                        <input type="text" class="form-control" name="ap_materno" id="ap_materno">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">email</span>
                        </div>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Puesto</span>
                        </div>
                        <input type="text" class="form-control" name="puesto" id="puesto">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Teléfono</span>
                        </div>
                        <input type="text" class="form-control" name="telefono" id="telefono">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Extensión</span>
                        </div>
                        <input type="text" class="form-control" name="extension" id="extension">
                    </div>                                      
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Programa</span>
                        </div>
                        <input type="text" class="form-control" readonly value="{{ $programa->nombre }}">
                    </div>                      
                    <input type="hidden" id="id_programa" name="id_programa" value="{{ $programa->id }}">
                    <br>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
        </form>

        </div>
        </div>
    </div>

    <!-- Modal Bajas Profesores -->
    <div class="modal fade" id="myModalBajasEst">
        <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEliminarAtr">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">¿Estas seguro de eliminar este profesor?</h4>                
                </div>

                <!-- Modal body -->
                <div class="modal-body">                    
                    <b><label id="numProfesor"></label></b>
                    <input type="hidden" id="idProfesor" name="idPro">
                    <input type="hidden" id="id_programa" name="id_programa" value="{{ $programa->id }}">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Eliminar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
        </div>
    </div>


    <!-- Modal Vista de Detalles -->
    <div class="modal fade" id="myModalDetalleEst">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">            
            <!-- Modal Header -->
            <div class="modal-header" style="background-color:#000;">
                <h4 class="modal-title" id="nom_per"></h4>            
            </div>
            <form id="formEditDetalle">
                <!-- Modal body -->
                <div class="modal-body">                        
                    <b><h5>Formación:</h5></b>
                    <div class="form-group">
                        <p id="formacion"></p>
                    </div>                
                    <b><h5>Email:</h5></b>
                    <div class="form-group">
                        <p id="det_email"></p>
                    </div>                  
                    <b><h5>Productos:</h5></b>
                    <div class="form-group">
                        <p id="productos">Generacion de sistema STA para control de inventario del ITSCH</p>
                    </div>                 
                    
                    <br>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Modificar</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </form>           
        </div>
    </div>
</div>

    
{{-- Fin de sección de modals --}}

{{-- Sección js --}}
@section('js')
    <script>
        function obtDatEditarEst(per)
        {
            $("#nombre").val(per['nombre']);
            $("#ap_paterno").val(per['ap_paterno']);  
            $("#ap_materno").val(per['ap_materno']); 
            $("#email").val(per['email']); 
            $("#puesto").val(per['puesto']);
            $("#telefono").val(per['telefono']);
            $("#extension").val(per['extension']);
            $("#facebook").val(per['facebook']);                             
            r="{{url('contenido/carreras')}}/updateEstructura/"+per['id'];
            $('#formEditarEst').attr('action', r);
        }

        function obtDatEliminarEst(per)
        {
            $("#numProfesor").text("Nombre: "+per['nombre']+per['ap_paterno']+per['ap_materno']);
            r="{{url('contenido/carreras')}}/destroyEstructura/"+per['id'];
            $('#formEliminarAtr').attr('action', r);
        }

        function obtDetalleEst(per)
        {   
            $("#nom_per").text(per['nombre']+" "+per['ap_paterno']+" "+per['ap_materno']);
            $("#det_email").text(per['email']);

            r="{{url('contenido/carreras')}}/editDetalles/"+per['id_programa']+"/"+per['id'];
            $('#formEditDetalle').attr('action', r);
        }
       

    </script>
@endsection
{{-- Fin de sección js --}}

@endsection