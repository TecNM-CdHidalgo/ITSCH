@extends('layouts.plant_admin')

@section('contenido')

    <h4><a href="{{ route('carreras.index') }}"> Carreras/</a>Editar atributos de egreso/ {{ $programa->nombre }}</h4>
    <hr>
    <div style="text-align: right">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalAltasAtr">
            Agregar atributos
        </button>
    </div>
    <table class="table">
        <thead>
            <th style="width: 5%">Numero</th>
            <th style="width: 30%">Descripción</th>
            <th style="width: 20%">Acciones</th>
            <th style="width: 45%">Criterios</th>
        </thead>
        <tbody>
            @php
                $van=0;
                $atrAnt="";
            @endphp
            @foreach ($atributos as $atr )
                @php
                    if($atr->numAtr==$atrAnt)
                    {
                        $van=$van+1;
                        echo "<tr>";
                    }
                    else
                    {
                        echo "<tr>";
                        $atrAnt=$atr->numAtr;
                        $van=0;

                    }
                @endphp
                @if($van==0)
                        <td>{{ $atr->numAtr }}</td>
                        <td>{{ $atr->desAtr }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalEditarAtr" onclick="obtDatEditarAtr({{ $atr }})">
                                <i class='fas fa-edit' style='font-size:14px'></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalBajasAtr" onclick="obtDatEliminarAtr({{ $atr }})">
                                <i class='fas fa-trash-alt' style='font-size:14px'></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" title="Add Criterios" data-target="#myModalAddCri" onclick="obtAtributo({{ $atr }})">
                                <i class='far fa-calendar-plus' style='font-size:14px'></i>
                            </button>
                        </td>
                        <td>
                            <table class="table table-sm">
                                <thead>
                                    <th style="width: 20%">Numero</th>
                                    <th style="width: 50%">Descripción</th>
                                    <th style="width: 30%">Acciones</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{  $atr->numCri }}</td>
                                        <td>{{  $atr->desCri }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalEditarCri" onclick="obtDatEditarCri({{ $atr }})">
                                                <i class='fas fa-edit' style='font-size:14px'></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalBajasCri" onclick="obtDatEliminarCri({{ $atr }})">
                                                <i class='fas fa-trash-alt' style='font-size:14px'></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <table class="table table-sm">
                            <thead>
                                <th style="width: 20%">Numero</th>
                                <th style="width: 50%">Descripción</th>
                                <th style="width: 30%">Acciones</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{  $atr->numCri }}</td>
                                    <td>{{  $atr->desCri }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalEditarCri" onclick="obtDatEditarCri({{ $atr }})">
                                            <i class='fas fa-edit' style='font-size:14px'></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalBajasCri" onclick="obtDatEliminarCri({{ $atr }})">
                                            <i class='fas fa-trash-alt' style='font-size:14px'></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>

                @endif
            @endforeach
        </tbody>
    </table>
    <br>

    {{-- Sección de Modals --}}

    <!-- Modal Altas Atributos -->
    <div class="modal fade" id="myModalAltasAtr">
        <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('carreras.storeAtributos') }}">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Alta de atributos</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Numero</span>
                        </div>
                        <input type="text" class="form-control" name="numero" placeholder="Ejemplo: A01" required>
                    </div>
                    <label class="input-group-text">Descripción</label>
                    <textarea class="form-control" required name="descripcion" rows="3"></textarea>
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
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
        </div>
    </div>


    <!-- Modal Editar Atributos -->
    <div class="modal fade" id="myModalEditarAtr">
    <div class="modal-dialog">
    <div class="modal-content">
        <form id="formEditarAtr">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Atributos</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Numero</span>
                    </div>
                    <input type="text" class="form-control" name="numAtr" id="num_updateAtr" required>
                </div>
                <label class="input-group-text">Descripción</label>
                <textarea class="form-control" required name="desAtr" rows="3" id="des_updateAtr"></textarea>
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

    <!-- Modal Bajas Atributos -->
    <div class="modal fade" id="myModalBajasAtr">
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
                        <input type="text" class="form-control" name="numero" placeholder="Ejemplo: C01" required>
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
                    <input type="text" class="form-control" name="numCri" id="num_updateCri" required>
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
            function obtDatEditarAtr(atr)
            {
                $("#num_updateAtr").val(atr['numAtr']);
                $("#des_updateAtr").val(atr['desAtr']);
                r="{{url('contenido/carreras')}}/updateAtributos/"+atr['idAtr'];
                $('#formEditarAtr').attr('action', r);
            }

            function obtDatEliminarAtr(atr)
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
