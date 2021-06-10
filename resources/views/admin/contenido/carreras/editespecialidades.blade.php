@extends('layouts.plant_admin')

@section('contenido')

    <h4><a href="{{ route('carreras.index') }}"> Carreras/</a>Editar especialidad/{{ $programa->nombre }}</h4>
    <hr>
    <div style="text-align: right">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalAltas">
            Agregar
        </button>
    </div>
    <table class="table">
        <thead>
            <th style="width: 5%">ID</th>
            <th style="width: 20%">Nombre</th>
            <th style="width: 15%">Clave</th>
            <th style="width: 45%">Objetivo</th>
            <th style="width: 5%">Reticula</th>
            <th style="width: 10%">Acciones</th>
        </thead>
        <tbody>
            @foreach ($especialidades as $esp)
                <tr>
                    <td>{{ $esp->id }}</td>
                    <td>{{ $esp->nombre }}</td>
                    <td>{{ $esp->clave }}</td>
                    <td>{{ $esp->objetivo }}</td>
                    <td>                        
                        <a href="{{ asset('storage/carreras_archivos/'.$esp->nom_arch_ret) }}" target="_blank" download type="button" class="btn btn-success btn-sm" title="Descargar reticula"><i class='fas fa-book' style='font-size:16px'></i></a>
                    </td>
                    <td>  
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalEditar" onclick="obtDatEditar({{ $esp }})">
                            <i class='fas fa-edit' style='font-size:14px'></i>
                        </button>
                    
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalBajas" onclick="obtDatEliminar({{ $esp }})">
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
                <form action="{{ route('carreras.storeEspecialidad') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Alta de especialidad</h4>                       
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input class="form-control" name="nombre" type="text" required placeholder="Nombre de la especialidad">
                        <br>
                        <input class="form-control" name="clave" type="text" required placeholder="Clave de la especialidad">
                        <br>
                        <textarea class="form-control" name="objetivo" id=""  rows="5" placeholder="Objetivo"></textarea>
                        <br>
                        <label for="reticula">Formato de la retícula completa de la especialidad</label>
                        <input type="file" name="reticula" id="reticula" class="form-control-file border">
                        <br>
                        <input type="text" class="form-control" value="{{ $programa->nombre }}" readonly>
                        <input type="hidden" name="id_programa" value="{{ $programa->id }}">
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
                <form id="formEditar" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Especialidad</h4>                        
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Nombre</span>
                            </div>
                            <input type="text" class="form-control" required name="nombre" id="nom_update">
                        </div>
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Clave</span>
                            </div>
                            <input type="text" class="form-control" required name="clave" id="cla_update">
                        </div>
                        
                           
                        <label>Objetivo</label>                          
                        <textarea class="form-control" required name="objetivo" id="obj_update" rows="10"></textarea>                            
                        <br>
                        <label for="Ed_reticula">Formato de la retícula completa de la especialidad</label>
                        <input type="file" name="reticula" id="Ed_reticula" class="form-control-file border">
                        <br>

                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Programa</span>
                            </div>
                            <input type="text" class="form-control" id="car_update" readonly value="{{ $programa->nombre }}">
                        </div>                      
                        <input type="hidden" id="id_programa" name="id_programa" value="{{ $programa->id }}">
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
                        <h4 class="modal-title" id="nom_eliminar"></h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        ¿Estas seguro de eliminar esta especialidad?
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
                function obtDatEditar(esp)
                {

                   $("#nom_update").val(esp['nombre']);
                   $("#cla_update").val(esp['clave']);
                   $("#obj_update").val(esp['objetivo']);                  
                   r="{{url('contenido/carreras')}}/updateEspecialidad/"+esp['id'];
                   $('#formEditar').attr('action', r);
                }

                function obtDatEliminar(esp)
                {
                   $("#nom_eliminar").text(esp['nombre']);
                   r="{{url('contenido/carreras')}}/destroyEspecialidad/"+esp['id'];
                   $('#formEliminar').attr('action', r);
                }
            </script>
        @endsection
    {{-- Fin de sección js --}}

@endsection
