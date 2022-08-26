@extends('layouts.plant_admin')

@section('contenido')
    <h4><a href="{{ route('carreras.index') }}"> Carreras/</a>Editar </h4>
    <hr>
    <div style="text-align: right">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalAltas">
            Agregar
        </button>
    </div>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($programas as $pro)
                <tr>
                    <td> {{ $pro->id }}</td>
                    <td> {{ $pro->nombre }} </td>
                    <td>
                        {{-- Ponemos el tipo de programa educativo del que se trata --}}
                        @if($pro->tipo==1)
                            Ingeniería
                        @else
                            Maestría
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalEditar" onclick="obtDatEditar({{ $pro }})">
                            <i class='fas fa-edit' style='font-size:14px'></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalBajas" onclick="obtDatEliminar({{ $pro }})">
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
                <form action="{{ route('carreras.storeCarrera') }}">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Alta de Carreras</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <label for="nombre">Nombre del programa</label>
                        <input class="form-control" name="nombre" type="text" required placeholder="Nombre del programa" id="nombre">
                        <label for="tipo">Tipo de programa</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option value="">Selecciona una opción</option>
                            <option value="1">Ingeniería</option>
                            <option value="2">Maestría</option>
                        </select>
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
                        <h4 class="modal-title">Editar Carrera</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <label for="nombre">Nombre del programa</label>
                        <input type="text" class="form-control" required name="nombre" id="nom_update" id="nombre">
                        <label for="tipo">Tipo de programa</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option value="">Selecciona una opción</option>
                            <option value="1">Ingeniería</option>
                            <option value="2">Maestría</option>
                        </select>
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
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        ¿Estas seguro de eliminar esta carrera?
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
                function obtDatEditar(pro)
                {

                   $("#nom_update").val(pro['nombre']);
                   r="updateCarrera/"+pro['id'];
                   $('#formEditar').attr('action', r);
                }

                function obtDatEliminar(pro)
                {
                   $("#nom_eliminar").text(pro['nombre']);
                   r="destroyCarrera/"+pro['id'];
                   $('#formEliminar').attr('action', r);
                }
            </script>
        @endsection
    {{-- Fin de sección js --}}
@endsection
