@extends('layouts.plant_admin')

@section('contenido')

    <h4><a href="{{ route('carreras.index') }}"> Carreras/</a>Editar especialidad</h4>
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
            <th>Clave</th>
            <th>Objetivo</th>
            <th>Acciones</th>
        </thead>
        <tbody>

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
                    <h4 class="modal-title">Alta de especialidad</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input class="form-control" name="nombre" type="text" required placeholder="Nombre de la especialidad">
                        <br>
                        <input class="form-control" name="clave" type="text" required placeholder="Clave de la especialidad">
                        <br>
                        <textarea class="form-control" name="objetivo" id=""  rows="5" placeholder="Objetivo"></textarea>
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
                    <h4 class="modal-title">Editar Carrera</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="text" class="form-control" required name="nombre" id="nom_update">
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
