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
            <th style="width: 30%">Area</th>
            <th style="width: 20%">Acciones</th>
            <th style="width: 15%">Detalles</th>           
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
                    </td>
                    <td>5</td>
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
                <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                            <span class="input-group-text">Facebook</span>
                        </div>
                        <input type="text" class="form-control" name="facebook" placeholder="Facebook">
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


    <!-- Modal Editar Estructura academica -->
    <div class="modal fade" id="myModalEditarEst">
    <div class="modal-dialog">
    <div class="modal-content">
        <form id="formEditarEst">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar de Personal</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                            <span class="input-group-text">Facebook</span>
                        </div>
                        <input type="text" class="form-control" name="facebook" id="facebook">
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

    <!-- Modal Bajas Atributos -->
    <div class="modal fade" id="myModalBajasEst">
        <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEliminarAtr">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">¿Estas seguro de eliminar este atributo?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h6>¡Recuerda que al eliminar este atributo, todos los criterios que esten relacionados con el, tambien serán eliminados!</h6>
                    <b><label id="numAtributo"></label></b>
                    <input type="hidden" id="idAtributo" name="idAtr">
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


    <!-- Modal Altas Criterios -->
    <div class="modal fade" id="myModalAddCri">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('carreras.storeCriterios') }}">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Alta de criterios</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">                        
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Numero</span>
                        </div>
                        <input type="text" class="form-control" name="numero" placeholder="Ejemplo: C01">
                    </div>  
                    <label class="input-group-text">Descripción</label> 
                    <textarea class="form-control" required name="descripcion" rows="3"></textarea>                       
                    <br>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Atributo</span>
                        </div>
                        <input type="text" class="form-control" readonly id="num_atributo">
                    </div>                      
                    <input type="hidden" name="id_atributos" id="id_atributo">
                    <input type="hidden" name="id_programa"  value="{{ $programa->id }}">
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

    <!-- Modal Editar Criterios -->
    <div class="modal fade" id="myModalEditarCri">
    <div class="modal-dialog">
    <div class="modal-content">
        <form id="formEditarCri">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Editar Criterios</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Numero</span>
                    </div>
                    <input type="text" class="form-control" name="numCri" id="num_updateCri">
                </div>  
                <label class="input-group-text">Descripción</label> 
                <textarea class="form-control" required name="desCri" rows="3" id="des_updateCri"></textarea>                       
                <br>
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
                <button type="submit" class="btn btn-success">Modificar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </form>

        </div>
        </div>
    </div>

    <!-- Modal Bajas Criterios -->
    <div class="modal fade" id="myModalBajasCri">
        <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEliminarCri">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">¿Estas seguro de eliminar este Criterio?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body"> 
                    <b><label id="numCriterio"></label></b>                  
                    <input type="hidden" id="idCriterio" name="idCri">
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

            function obtDatEliminarEst(atr)
            {
                $("#numAtributo").text("Atributo numero: "+atr['numAtr']);
                r="{{url('contenido/carreras')}}/destroyAtributos/"+atr['idAtr'];
                $('#formEliminarAtr').attr('action', r);
            }

            function obtAtributo(atr)
            {   
                $("#num_atributo").val(atr['numAtr']);
                $("#id_atributo").val(atr['idAtr']);
            }

            function obtDatEditarCri(atr)
            {
                $("#num_updateCri").val(atr['numCri']);
                $("#des_updateCri").val(atr['desCri']);                                 
                r="{{url('contenido/carreras')}}/updateCriterios/"+atr['idCri'];
                $('#formEditarCri').attr('action', r);
            }

            function obtDatEliminarCri(atr)
            {
                $("#numCriterio").text(atr['numCri']);
                r="{{url('contenido/carreras')}}/destroyCriterios/"+atr['idCri'];
                $('#formEliminarCri').attr('action', r);
            }

        </script>
    @endsection
    {{-- Fin de sección js --}}

@endsection