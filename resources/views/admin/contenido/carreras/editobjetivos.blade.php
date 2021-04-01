@extends('layouts.plant_admin')

@section('contenido')

    <h4><a href="{{ route('carreras.index') }}"> Carreras/</a>Editar objetivos educacionales/{{ $programa->nombre }}</h4>
    <hr>
    <div style="text-align: right">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalAltas">
            Agregar
        </button>
    </div>
    <table class="table">
        <thead>
            <th style="width: 5%">ID</th>
            <th style="width: 40%">Descripción</th>
            <th style="width: 25%">Criterio</th>
            <th style="width: 20%">Indicador</th>
            <th style="width: 10%">Acciones</th>
        </thead>
        <tbody>
            @foreach ($objetivos as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->descripcion }}</td>
                    <td>{{ $obj->criterio }}</td>
                    <td>{{ $obj->indicador }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalEditar" onclick="obtDatEditar({{ $obj }})">
                            <i class='fas fa-edit' style='font-size:14px'></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalBajas" onclick="obtDatEliminar({{ $obj }})">
                            <i class='fas fa-trash-alt' style='font-size:14px'></i>
                        </button> 
                    </td>
                </tr>                
            @endforeach           
        </tbody>
    </table>
    <br>

    {{-- Sección de Modals --}}

    <!-- Modal Altas -->
    <div class="modal fade" id="myModalAltas">
        <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('carreras.storeObjetivos') }}">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Alta de objetivo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    
                    <label class="input-group-text">Descripción</label> 
                    <textarea class="form-control" required name="descripcion" rows="3"></textarea>                       
                    <br>
                    <label class="input-group-text">Criterio</label> 
                    <textarea class="form-control" required name="criterio" rows="3"></textarea>                      
                    <br>
                    <label class="input-group-text">Indicador</label> 
                    <textarea class="form-control" required name="indicador" rows="3"></textarea>                     
                    <br>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Programa</span>
                        </div>
                        <input type="text" class="form-control" id="car_update" readonly value="{{ $programa->nombre }}">
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

    <!-- Modal Editar -->
    <div class="modal fade" id="myModalEditar">
    <div class="modal-dialog">
    <div class="modal-content">
        <form id="formEditar">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Editar Objetivo</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <label class="input-group-text">Descripción</label> 
                <textarea class="form-control" required name="descripcion" id="des_update"  rows="3"></textarea>                       
                <br>
                <label class="input-group-text">Criterio</label> 
                <textarea class="form-control" required name="criterio" id="cri_update"  rows="3"></textarea>                      
                <br>
                <label class="input-group-text">Indicador</label> 
                <textarea class="form-control" required name="indicador" id="ind_update"  rows="3"></textarea>                     
                <br>
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Programa</span>
                    </div>
                    <input type="text" class="form-control" id="car_update" readonly value="{{ $programa->nombre }}">
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

    <!-- Modal Bajas -->
    <div class="modal fade" id="myModalBajas">
        <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEliminar">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">¿Estas seguro de eliminar este objetivo?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <label id="descripcion"></label>
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
            function obtDatEditar(obj)
            {
                $("#des_update").val(obj['descripcion']);
                $("#cri_update").val(obj['criterio']);
                $("#ind_update").val(obj['indicador']);                  
                r="{{url('contenido/carreras')}}/updateObjetivos/"+obj['id'];
                $('#formEditar').attr('action', r);
            }

            function obtDatEliminar(obj)
            {
                $("#descripcion").text(obj['descripcion']);
                r="{{url('contenido/carreras')}}/destroyObjetivos/"+obj['id'];
                $('#formEliminar').attr('action', r);
            }
        </script>
    @endsection
    {{-- Fin de sección js --}}

@endsection
