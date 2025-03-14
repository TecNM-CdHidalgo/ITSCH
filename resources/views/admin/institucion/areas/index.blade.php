@extends('layouts.plant_admin')
@section('titulo','Alta de área')
@section('contenido')
    @section('ruta','Alta de área')
    <div class="row">
        <div class="col-sm-4">
            <h6>Agregar división o departamento dentro del ITSCH</h6>
            <form action="{{ route('guardar.area') }}" method="post">
                @csrf
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nombre</span>
                    </div>
                    <input type="text" name="nombre" id="nombre" required class="form-control" placeholder="Departamento o división">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary btn-sm" title="Guardar"><i class="fa fa-save" style="font-size:14px;"></i></button>                       
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            {{--tabla para mostrar las áreas existentes--}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areas as $ar )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ar->nombre }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalModificar" title="Modificar" onclick="modificar({{ $ar }})"><i class='far fa-edit' style='font-size:14px'></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalEliminar" title="Eliminar" onclick="eliminar({{ $ar }})"><i class='far fa-trash-alt' style='font-size:14px'></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>

     <!-- Sección de modals -->
     <div class="modal fade" id="myModalModificar">
        <div class="modal-dialog">
        <form action="{{ route('areas.update') }}" method="get">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Modificar áreas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="NombreMod"></label>
                        <input type="text" class="form-control" name="nombreMod" id="NombreMod" aria-describedby="NombreMod" required>
                        <small id="id_nombre" class="form-text text-muted">Nombre del área</small>
                    </div>
                    <input type="hidden" name="id_area" readonly id="id_area">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Modificar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
        </div>
    </div>

    <div class="modal fade" id="myModalEliminar">
        <div class="modal-dialog">
        <form action="{{ route('areas.eliminar') }}" method="get">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Eliminar área</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h6 id="msjEliminar"></h6>
                    <input type="hidden" name="id_areaE" id="id_areaE" readonly>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Eliminar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
        </div>
    </div>

    @section('js')
        <script>
            function modificar(area)
            {
               $('#NombreMod').val(area['nombre']);
               $('#id_area').val(area['id']);
            }

            function eliminar(area)
            {
                $('#msjEliminar').text('Esta seguro(a) de eliminar el área: '+area['nombre']);
                $('#id_areaE').val(area['id']);
            }
        </script>
    @endsection
@endsection

           
